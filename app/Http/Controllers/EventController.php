<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Abdullllllllll
        $events = Event::where('date', '>=', Carbon::today())->orderby('time','asc')->get();
        
        return view("welcome")
            ->with(compact('events'));
                
    }
    public function index2(Event $event)
    {
        $events = Event::where('date', '>=', Carbon::today())->orderby('time','asc')->get();
        
        return view('events/index')
            ->with(compact('events'));
        
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $event = Event::findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'date' => 'required|date',
        'time' => 'required|string',
        'location' => 'required|string|max:255',
        // 'price' => 'required|numeric',
    ]);

    $event->title = $request->get('title');
    $event->date = $request->get('date');
    $event->time = $request->get('time');
    $event->location = $request->get('location');
    $event->save();

    return redirect()->route('events.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $event = Event::findOrFail($id);
    $event->delete();

    return redirect()->route('events.index')->with('success', 'Evenement verwijderd!');
}
}
