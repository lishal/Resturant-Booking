<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Staff;

use App\Restaurant;

class RestaurantController extends Controller
{

    public function __construct( Request $request)
    {
        $this->middleware('auth:admin');
        $this->request = $request;
    }

    public function index(){
        $restaurant_details=\DB::table('restaurant_details')
        ->join('staff', 'id', '=', 'restaurant_details.restaurant_owner')
        ->select('restaurant_details.*', 'staff.firstname','staff.lastname')
        ->get();
        // return($restaurant_details);

        return view('admin.admin-content.Restaurant.index',['restaurant_details'=>$restaurant_details]);
    }

    public function add($restaurant_id=0){
        $staffs= Staff::all();
        $restaurant= new Restaurant();
        if($restaurant_id > 0) {
            $restaurant = $restaurant->where('restaurant_id', $restaurant_id)->first();
        }

        return view('admin.admin-content.Restaurant.add',['restaurant'=>$restaurant,'staffs'=>$staffs]);
    }
    public function save(Request $request){
        $restaurant_id = $this->request->input('restaurant_id');
        if($restaurant_id == 0) {
            $this->validate($request, [
                'restaurant_name' => 'required',
                'restaurant_owner' => 'required',
                'phone_number'=>"required|regex:/[0-9]{10}/|min:10|max:10|unique:restaurant_details,phone_number",
                'location'=> 'required',
                'description'=> 'required|min:3',
                'image'=>'required'
            ]);
        }
        else{
            $this->validate($request, [
                'restaurant_name' => 'required',
                'restaurant_owner' => 'required',
                'phone_number'=>"required|regex:/[0-9]{10}/|min:10|max:10",
                'location'=> 'required',
                'description'=> 'required|min:3',
            ]);
        }
        $restaurant_name = $this->request->input('restaurant_name');
        $restaurant_owner = $this->request->input('restaurant_owner');
        $phone_number = $this->request->input('phone_number');
        $location = $this->request->input('location');
        $description = $this->request->input('description');

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename=time().".".$extension;
            $file->move('uploads/company_images/',$filename);
        }
       

        $data = [
            'restaurant_name' => $restaurant_name, 
            'restaurant_owner' => $restaurant_owner,
            'description' => $description,
            'phone_number' =>$phone_number,
            'location'=>$location,
            'image'=>$filename,
            'updated_at' => date('Y-m-d H:i:s')
        ];

        if($restaurant_id == 0) {
            $data['created_at'] = date('Y-m-d H:i:s');
            \DB::table('restaurant_details')->insert($data);
            $message = "Restaurant Added Successfully.";
        }
        else{
            \DB::table('restaurant_details')
            ->where('restaurant_id', $restaurant_id)
            ->update($data);
            $message = "Restaurant updated successfully.";
        }
        return redirect('/AdminrestaurantDetails')->with('success',$message);
    }
    public function delete($restaurant_id){
        
        $restaurant = Restaurant::where('restaurant_id', '=',$restaurant_id)->delete();
  
        if($restaurant==1){
            return redirect('/AdminrestaurantDetails')->with('success','Restaurant deleted successfully.');
        }
        else{
            return redirect('/AdminrestaurantDetails')->with('error','Something went wrong. Please try again.');
        }
    }
}
