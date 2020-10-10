<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use Illuminate\Support\Facades\Hash;


class AdminStaffController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth:admin');
        $this->request = $request;
    }
    public function viewlist()
    {
        $staffs= Staff::all();
        return view('admin.admin-content.staff.staff',['staffs'=>$staffs]);
    }
    public function add($staff_id=0){
        $staff = new Staff();
        if($staff_id > 0) {
            $staff = $staff->where('id', $staff_id)->first();
        }
        return view('admin.admin-content.staff.addstaff',['staff'=>$staff]);
    }

    public function save(Request $request){
        $this->validate($request, [
            'fname' => 'required|min:3|max:255|string',
            'lname' => 'required|min:3|max:255|string',
            'email'=>'required|unique:staff|email|string',
            'password'=> 'min:6|string',
        ]);
        $staff_id = $this->request->input('staff_id');
        $fname = $this->request->input('fname');
        $lname = $this->request->input('lname');
        $email = $this->request->input('email');
        $password = $this->request->input('password');

        $data = [
            'firstname' => $fname, 
            'lastname' => $lname, 
            'email' => $email, 
             
        ];
        if($staff_id == 0) {
            if($password != ""){
                $data['created_at'] = date('Y-m-d H:i:s');
                $data['password'] = Hash::make($password);
                \DB::table('staff')->insert($data);
                $message = "Record added successfully.";
            }
        }
        else{
            \DB::table('staff')
            ->where('id', $staff_id)
            ->update($data);
            $message = "Record updated successfully.";
        }
        return redirect('/stafflist')->with('success',$message);

    }
    public function delete($id){
        $delete= Staff::find($id);
        $delete->delete();
        $message="Staff Successfully Deleted";
        return redirect('/stafflist')->with('success',$message);
       
    }
    public function changepassword($id){
        $staff = Staff::where('id', $id)->first();
        return view('admin.admin-content.staff.changepassword',['staff'=>$staff]);
    }
    public function staffChangePassword(Request $request , $id){
        $this->validate($request, [
            'password' => 'required|min:8|max:255|string',
            'confirmpassword' => 'required|min:8|max:255|string',
        ]);
        $password = $this->request->input('password');
        $confirmpassword = $this->request->input('confirmpassword');
        $data['password'] = Hash::make($password);
        $staff_id = $this->request->input('staff_id');
        if($password==$confirmpassword){
            \DB::table('staff')
            ->where('id', $staff_id)
            ->update($data);
            $message = "Password Changed Successfully.";
            return redirect('/stafflist')->with('success',$message);
        }
        else{
            $message = "Please Check Your Password";
            $staff = Staff::where('id', $id)->first();
            return view('admin.admin-content.staff.changepassword',['staff'=>$staff])->withErrors(['error' => $message]);
        }
        
    }

}
