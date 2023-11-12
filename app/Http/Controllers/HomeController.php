<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $events = Event::whereDate('date', '>', Carbon::now())->orderBy('date')->get();
        return view('home')->with('events', $events);
    }

    public function show(Event $event)
    {
        return view('admin/dashboard');
    }
    public function test(Event $event)
    {
        $events = Event::where('date', '>=', Carbon::today())->orderby('time','asc')->get();
        
        return view('events/index')
            ->with(compact('events'));
        
    }
}