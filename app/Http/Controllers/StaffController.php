<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Staff;
use App\TableSeat;
use App\Menu;
use App\User;
use App\CustomerBooking;
use DB;
use Auth;
use App\Restaurant;


class StaffController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware('auth:staff');
        $this->request = $request;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $staff=Auth::user();
        $user= User::count();
        $customer=CustomerBooking::where('status','1')
        ->count();
        // return($staff);
        return view('staff.home',['staff'=>$staff,'user'=>$user,'customer'=>$customer]);
    }

    public function display(){
        $staff_id = auth()->id();
        $restaurant = Restaurant::where('restaurant_owner', '=',$staff_id)
        ->first();
        $menu = Menu::where('restaurant_id', '=',$restaurant->restaurant_id)
        ->get();
        return view('staff.MenuLogo.index',['menu'=>$menu]);
    }

    public function add($id){
        // $restaurant = Restaurant::where('restaurant_id', '=',$restaurant_id)
        // ->join('staff', 'id', '=', 'restaurant_details.restaurant_owner')
        // ->select('restaurant_details.*', 'staff.firstname','staff.lastname')
        // ->first();

        $restaurant = Staff::where('id', '=',$id)
        ->join('restaurant_details', 'restaurant_owner', '=', 'staff.id')
        ->select('restaurant_details.*')
        ->first();
        // return($restaurant_id);
        // return($id);
        return view('staff.MenuLogo.add',['restaurant'=>$restaurant]);
    }
    public function save(Request $request){
        $restaurant_id = $this->request->input('restaurant_id');
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $extension = $file->getClientOriginalExtension();
            $filename=time().".".$extension;
            $file->move('uploads/logo/',$filename);
        }
        if($request->hasFile('pdf')){
            $file = $request->file('pdf');
            $extension = $file->getClientOriginalExtension();
            $filename2=time().".".$extension;
            $file->move('uploads/pdf/',$filename2);
        }
        $data =[
            'restaurant_id'=>$restaurant_id,
            'logo'=>$filename,
            'menu'=>$filename2,
        ];
        $data['created_at'] = date('Y-m-d H:i:s');
        \DB::table('menulists')->insert($data);
        $message = "Data Added Successfully.";
        return redirect('/menu')->with('success',$message);

    }

    public function displayseat($id){
        $restaurant = Staff::where('id', '=',$id)
        ->join('restaurant_details', 'restaurant_owner', '=', 'staff.id')
        ->select('restaurant_details.*')
        ->first();

        $tableSeat = TableSeat::where('restaurant_id', '=',$restaurant->restaurant_id)
        ->get();
       

        // return($restaurant->restaurant_id);

        return view('staff.Seat.index',['tableSeat'=>$tableSeat]);
    }

    public function addseat($id){
        // $restaurant = Restaurant::where('restaurant_id', '=',$restaurant_id)
        // ->join('staff', 'id', '=', 'restaurant_details.restaurant_owner')
        // ->select('restaurant_details.*', 'staff.firstname','staff.lastname')
        // ->first();

        $restaurant = Staff::where('id', '=',$id)
        ->join('restaurant_details', 'restaurant_owner', '=', 'staff.id')
        ->select('restaurant_details.*')
        ->first();
        // return($restaurant_id);
        // return($id);
        return view('staff.Seat.add',['restaurant'=>$restaurant]);
    }

    public function status($id){
        $status = TableSeat::where('id', '=',$id)
        ->first();
        if($status->status==1){
            \DB::table('table_seats')
            ->where('id',$id)
            ->update(['status' => '0']);
        }
        elseif($status->status==0){
            \DB::table('table_seats')
            ->where('id',$id)
            ->update(['status' => '1']);
        }
        $staff=Auth::user();
        $restaurant = Staff::where('id', '=',$staff->id)
        ->join('restaurant_details', 'restaurant_owner', '=', 'staff.id')
        ->select('restaurant_details.*')
        ->first();
        

        $tableSeat = TableSeat::where('restaurant_id', '=',$restaurant->restaurant_id)
        ->get();
        return view('staff.Seat.index',['tableSeat'=>$tableSeat]);
    }

    public function saveseat(Request $request){
        $this->validate($request, [
            'seat' => 'required|string',
            'seat_type' => 'required|string',
        ]);
        $seat = $this->request->input('seat');
        $seat_type = $this->request->input('seat_type');
        $restaurant_id = $this->request->input('restaurant_id');
        $data = [
            'seat_name' => $seat, 
            'seat_type' => $seat_type, 
            'restaurant_id'=>$restaurant_id,
            'updated_at' => date('Y-m-d H:i:s')
        ];
        $data['created_at'] = date('Y-m-d H:i:s');
        \DB::table('table_seats')->insert($data);
        $message = "Seat added successfully.";
        return redirect('staff/home');
    }
    public function deleteseat($id){
        $deleteseat = TableSeat::find($id);
        if($deleteseat->delete()){
            $staff=Auth::user();
            $restaurant = Staff::where('id', '=',$staff->id)
            ->join('restaurant_details', 'restaurant_owner', '=', 'staff.id')
            ->select('restaurant_details.*')
            ->first();
            

            $tableSeat = TableSeat::where('restaurant_id', '=',$restaurant->restaurant_id)
            ->get();
            return view('staff.Seat.index',['tableSeat'=>$tableSeat]);
        }
    }
    public function availablecustomer(){
        $staff_id = auth()->id();
        $restaurant = Restaurant::where('restaurant_owner', '=',$staff_id)
        ->first();
        $customers = DB::table('customer_booking')
        ->where('customer_booking.restaurant_id', '=',$restaurant->restaurant_id)
        
        ->Join('users','customer_booking.customer_id' , '=', 'users.id')
        ->Join('table_seats','customer_booking.table_id' , '=', 'table_seats.id')
        ->where('customer_booking.restaurant_id', '=',$restaurant->restaurant_id)
        // ->Join('table_seats','customer_booking.restaurant_id' , '=', 'table_seats.restaurant_id')
        // ->where('table_seats.id', '=','customer_booking.table_id')
        ->select('customer_booking.id','name','phonenumber','arrival_time','seat_name','seat_type','customer_booking.status')
        ->get();
        
        return view ('staff.AvailableCustomer.index',['customers'=>$customers]);
    }
    public function customerStatus($id){
        $staff_id = auth()->id();
        $restaurant = Restaurant::where('restaurant_owner', '=',$staff_id)
        ->first();
        $status = CustomerBooking::where('id', '=',$id)
        ->where('restaurant_id','=',$restaurant->restaurant_id)
        ->first();
        if($status->status==1){
            \DB::table('customer_booking')
            ->where('id',$id)
            ->update(['status' => '0']);
        }
        \DB::table('table_seats')
        ->where('id',$status->table_id)
        ->update(['status' => '0']);
        return redirect('/availablecustomer');
    }
    
}
