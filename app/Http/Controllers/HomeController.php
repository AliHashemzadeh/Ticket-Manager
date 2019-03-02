<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $events = Event::all();
        $firstEvent = Event::first();
        $twoEvents = Event::skip(1)->take(2)->get();
//        dd($firstEvent);
        return view('home.homepage', compact('events', 'twoEvents', 'firstEvent'));
    }


}
