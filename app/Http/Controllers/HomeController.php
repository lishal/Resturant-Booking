<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Restaurant;
use App\Staff;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $restaurants= Restaurant::all();
        // return($restaurants);
        return view('user.home',['restaurants'=>$restaurants]);
    }
    public function list()
    {
        $restaurants= Restaurant::all();
        // return($restaurants);
        return view('user.Restaurant.index',['restaurants'=>$restaurants]);
    }
    public function contactus(){
        return view('user.contactus');
    }
}
