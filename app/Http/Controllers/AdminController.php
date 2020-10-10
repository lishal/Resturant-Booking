<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
Use App\Staff;
use App\CustomerBooking;



class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /** 
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user= User::count();
        $staff=Staff::count();
        $customer=CustomerBooking::where('status','1')
        ->count();
        return view('admin.admin-content.dashboard',['user'=>$user,'staff'=>$staff,'customer'=>$customer]);
    }
}
