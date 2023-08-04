<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignIpRequest;
use App\Http\Requests\SignUpRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('frontend.auth.login');
    }
    public function signIn(SignIpRequest $request)
    {
        $is_login = Auth::attempt(['email'=>$request->email , 'password'=>$request->password]);
        if ($is_login != true){
            return redirect()->route('front.login')->with('error',translate('Authentication failed. Please check your email  or password'));
        }
        return redirect()->route('index')->with('success','welcome '.Auth::user()->name);
    }

    public function register()
    {
        return view('frontend.auth.register');
    }

    public function signup(SignUpRequest $request)
    {
        $user = User::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        Auth::login($user);
        return redirect()->route('index')->with('success','welcome '.Auth::user()->name);
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('front.login');
    }
}
