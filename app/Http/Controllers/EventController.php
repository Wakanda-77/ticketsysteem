<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\facades\storage;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Abdullllllllll
        $events = Event::where('date', '>=', Carbon::today())->orderby('date','asc')->get();
        
        return view("welcome")
            ->with(compact('events'));
                
    }
    public function adminindex(Event $event)
    {
        $events = Event::where('date', '>=', Carbon::today())->orderby('id','asc')->get();
        
        return view('events/index')
            ->with(compact('events'));
        
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|max:255',
            'discription' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Valideer het uploaden van een afbeelding
        ]);

        // Verwerk de geüploade afbeelding
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension(); // Genereer een unieke bestandsnaam
            $image->storeAs('public/images', $imageName); // Sla de afbeelding op in de 'public/images' map
            $image = asset('storage/images/' . $imageName); // Genereer de URL voor de opgeslagen afbeelding
        }

        // Maak een nieuw evenement aan en sla het op in de database
        $event = new Event([
            'title' => $validatedData['title'],
            'date' => $validatedData['date'],
            'time' => $validatedData['time'],
            'location' => $validatedData['location'],
            'discription' => $validatedData['discription'] ?? '',
            'image' => $image ?? '', // Sla de URL van de opgeslagen afbeelding op
        ]);
        $event->save();
        
        return redirect()->route('events.index');
                    
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
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'date' => 'required|date',
            'time' => 'required',
            'location' => 'required|max:255',
            'discription' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Laat toe dat een afbeelding optioneel is bij het bijwerken
        ]);
    
        $event = Event::findOrFail($id);
    
        // Verwerk de geüploade afbeelding als deze is verstrekt
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
            $event->image = asset('storage/images/' . $imageName);
        }
    
        // Werk de overige velden van het evenement bij
        $event->title = $validatedData['title'];
        $event->date = $validatedData['date'];
        $event->time = $validatedData['time'];
        $event->location = $validatedData['location'];
        $event->discription = $validatedData['discription'] ?? '';
    
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
