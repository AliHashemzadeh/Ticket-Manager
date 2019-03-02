<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showLogin()
    {
        return view('home.login');
    }

    public function login(UserRequest $userRequestَ)
    {
        $user_data = [
            'email' => request()->input('email'),
            'password' => request()->input('password'),
        ];


        if (Auth::attempt($user_data) && Auth::user()->role == 1) {

            return redirect('/admin/panel')->with('success', 'ورود با موفقیت انجام شد. خوش آمدید!');
        } elseif (Auth::attempt($user_data) && Auth::user()->role == 0) {
            return redirect('/')->with('success', 'ورود با موفقیت انجام شد. خوش آمدید!');
        } else {
            return back()->with('fail', 'نام کاربری یا کلمه عبور اشتباه است.');
        }
    }

    public function showRegister()
    {
        return view('home.register');
    }

    public function register(UserRequest $userRequestَ)
    {
        $user_data = [
            'name' => request()->input('name'),
            'email' => request()->input('email'),
            'password' => request()->input('password'),
        ];

        if (User::create($user_data)) {
            return redirect('/')->with('success', 'ثبت نام با موفقیت انجام شد!');
        } else {
            return back()->with('fail', 'مشکلی پیش آمده لطفا مجددا تلاش کنید');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/')->with('success', 'به امید دیدار مجدد !');
    }
}
