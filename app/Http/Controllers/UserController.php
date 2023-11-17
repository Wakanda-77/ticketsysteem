<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class userController extends Controller
{
    public function index()
    {
        
        $users = User::all();
        
        return view("users.index")
            ->with(compact('users'));
    }
    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('users.edit')->with('users', $users);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            
        ]);
    
        $users = User::findOrFail($id);

        // Werk de overige velden van het evenement bij
        $users->name = $validatedData['name'];
        $users->email = $validatedData['email'];
       
        $users->save();
    
        return redirect()->route('users.index');
    }



    public function create()
    {
        return view('users.create');
    }


    public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|max:255', // Verbetering: voeg 'email' validatie toe
        'password' => ['required', 'string', 'max:255'], // Verbetering: voeg 'max' toe aan 'password'
    ]);

    // Veilig wachtwoord opslaan met bcrypt
    $users = User::create([
        'name' => $validatedData['name'],
        'email' => $validatedData['email'],
        'password' => Hash::make($validatedData['password']),
    ]);

    return redirect()->route('users.index');
}
}
