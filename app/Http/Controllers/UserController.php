<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function index(){
        $users= User::all();
        return view('admin.admin-content.user',['users'=>$users]);
    }
    public function delete($id){
     $delete= User::find($id);
     $delete->delete();
     $message="User Successfully Deleted";
     return redirect('/user')->with('success',$message);
    }
}
