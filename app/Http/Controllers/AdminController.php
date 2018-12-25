<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
        $users = User::all();
        return view('admin.panel', compact('users'))->with(['card_title' => 'لیست کاربران']);
    }

    public function showLogin()
    {
        return view('admin.login');
    }

    public function login(UserRequest $userRequest)
    {
        $admin_data = [
            'email' => request()->input('email'),
            'password' => request()->input('password'),
            'role' => 1
        ];


        if (Auth::attempt($admin_data)) {

            return redirect('/admin/panel')->with('success', 'ورود با موفقیت انجام شد. خوش آمدید!');
        } else {
            return back()->with('fail', 'نام کاربری یا کلمه عبور اشتباه است.');
        }
    }


}
