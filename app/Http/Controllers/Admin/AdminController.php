<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function dashboard()
    {
        Session::put('page', 'dashboard');
        return view('admin.dashboard');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die;

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required|max:30',
            ];

            $customMessages = [
                'email.required' => 'Email is required',
                'email.email' => 'Valid email is required',
                'password.required' => 'Password is required',
            ];

            $this->validate($request, $rules, $customMessages);

            if (Auth::guard('admin')->attempt(['email' => $data['email'], 'password' => $data['password']])) {
                return redirect('admin/dashboard');
            } else {
                return redirect()->back()->with('error message', 'Invalid Email or Password');
            }
        }
        return view('admin.login');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }

    public function updatePassword(Request $request){
        Session::put('page', 'update-password');
        if($request->isMethod('post')){
            $data = $request->all();
            // checking if the password is correct
            if(Hash::check($data["current_pwd"], Auth::guard('admin')->user()->password)){
                // checking if the new and confirm password match
                if($data["new_pwd"] == $data["confirm_pwd"]){
                    Admin::where('id', Auth::guard('admin')->user()->id)->update(['password'=>bcrypt($data['new_pwd'])]);
                    return redirect()->back()->with('success_message', 'New password and retype password match');
                }else{
                    return redirect()->back()->with('error_message', 'You have successfully update your password');
                }
            }else{
                return redirect()->back()->with('error_message', 'Your current password is Incorrect');
            }
        }
        return view('admin.update_password');
    }

    public function checkCurrentPassword(Request $request){
        $data = $request->all();
        if(Hash::check($data["current_pwd"], Auth::guard('admin')->user()->password)){
            return true;
        }else{
            return false;
        }
    }

    public function updateDetails(Request $request){
        Session::put('page', 'update_details');
        if ($request->isMethod('post')) {
            $data = $request->all();
            // echo "<pre>"; print_r($data); die; 

            $rules = [
                'name' => 'required|max:255',
            ];

            $customMessages = [
                'name.required' => 'Name is required',
            ];

            $this->validate($request, $rules, $customMessages);

            // update the admin details
            Admin::where('email', Auth::guard('admin')->user()->email)->update(['name' => $data['name']]);
            return redirect()->back()->with('success_message', 'You have suceessfully updateed your details');
        }
        return view('admin.update_details');
    }
}
