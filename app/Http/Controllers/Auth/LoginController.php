<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Facades\Request;
use App\Http\Controllers\Auth\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function authenticated(Request $request, User $user){
    //     session()->flash('success', 'Welcome back, ' . $user->first_name);
    //     return redirect()->intended($this->redirectPath());
    // }
}
