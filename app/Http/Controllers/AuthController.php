<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\AuthLoginRequest;
use App\Http\Requests\Auth\AuthRegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    //show login page
    public function showLogin()
    {
        return view('pages.login');
    }

    //show register page
    public function showRegister()
    {
        return view('pages.register');
    }

    //register user
    public function postRegister(AuthRegisterRequest $request)
    {
        //register 
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        //login
        Auth::login($user);

        return back()->with('success', 'Successfully Login');
    }

    //login user
    public function postLogin(AuthLoginRequest $request)
    {
        //login
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/');
        }
        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không chính xác',
        ]);
    }

    //reset password

    //logout
    public function logout()
    {
        //delete cart
        session()->forget('cart');
        
        Auth::logout();
        return back();
    }

}
