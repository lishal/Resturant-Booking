<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

class IndividualRestaurantController extends Controller
{
    public function index($restaurant_id){
        $restaurant = Restaurant::where('restaurant_id', '=',$restaurant_id)
        ->join('staff', 'id', '=', 'restaurant_details.restaurant_owner')
        ->select('restaurant_details.*', 'staff.firstname','staff.lastname')
        ->first();
        // return($restaurant);
        return view('user.IndividualRestaurant.index',['restaurant'=>$restaurant]);
    }
}
