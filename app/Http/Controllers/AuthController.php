<?php

namespace App\Http\Controllers;

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
    public function postRegister(Request $request)
    {
        //validation
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8|confirmed',
        ],[
            'name.required' => 'Tên không được để trống.',
            'name.min' => 'Tên không được ít hơn 3 ký tự.',
            'name.max' => 'Tên không được quá 255 ký tự.',
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'email.max' => 'Email không được quá 255 ký tự.',
            'email.unique' => 'Email đã tồn tại.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu không được ít hơn 8 ký tự.',
            'password.confirmed' => 'Mật khẩu nhập lại không khớp.',
        ]);
        

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
    public function postLogin(Request $request)
    {
        //validation
        $details = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ],[
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không hợp lệ.',
            'password.required' => 'Mật khẩu không được để trống.',
            'password.min' => 'Mật khẩu không được ít hơn 8 ký tự.',
        ]);

        //login
        if (Auth::attempt($details)) {
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
        Auth::logout();
        return back();
    }

}
