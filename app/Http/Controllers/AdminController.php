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

}
