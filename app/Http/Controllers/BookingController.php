<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

use App\TableSeat;
use App\CustomerBooking;
use App\Menu;



class BookingController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth');
        $this->request = $request;
       
    }
    public function index($restaurant_id){
        $user = auth()->user();
        $restaurant = Restaurant::where('restaurant_id', '=',$restaurant_id)->first();

        $tableSeat = TableSeat::where('restaurant_id', '=',$restaurant_id)
        ->get();

        // return($tableSeat);
        return view('user.Booking.index',['tableSeat'=>$tableSeat,'restaurant'=>$restaurant]);
    }
    public function booking(Request $request){
        $this->validate($request, [
            'seat' => 'required|string',
            'arrival_time' => 'required|string',
        ]);
        $seat = $this->request->input('seat');
        $customer_id = $this->request->input('customer_id');
        $restaurant_id = $this->request->input('restaurant_id');
        $arrival_time = $this->request->input('arrival_time');
        
        $customer_id = auth()->id();
        $customer = CustomerBooking::where('customer_id', '=',$customer_id)
        ->first();
        // return($arrival_time);
        if($customer==""){
            $data = [
                'table_id' => $seat, 
                'customer_id' => $customer_id, 
                'restaurant_id' => $restaurant_id, 
                'arrival_time'=>$arrival_time,
                'status'=>"1",
                'updated_at' => date('Y-m-d H:i:s')
            ];
            $data['created_at'] = date('Y-m-d H:i:s');
            \DB::table('customer_booking')->insert($data);
            \DB::table('table_seats')
            ->where('id',$seat)
            ->update(['status' => '1']);
            $message = "Your Booking is Placed";
            return redirect('/home')->with('success',$message);
        }
        elseif($customer->status=="1"){
            return redirect('/home')->withErrors(['error' => 'You Have already One booking']);
        }
    
        
        
    }
    public function customermenu($id){
        
        $menu = Menu::where('restaurant_id', '=',$id)
        ->first();
        // return($menu);
        return view('user.IndividualRestaurant.menu',['menu'=>$menu]);
    }
}
