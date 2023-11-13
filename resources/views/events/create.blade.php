

@extends('layouts.app') {{-- Je kunt 'app' vervangen door de naam van je layout --}}

@section('content')
    <h1>Bewerk evenement</h1>

    <form action="{{ route('events.store') }}" method="POST">
        @csrf
        

        <label for="title">Titel:</label>
        <input type="text" name="title" " required>

        <label for="date">Datum:</label>
        <input type="date" name="date"  required>

        <label for="time">Tijd:</label>
        <input type="text" name="time"  required>

        <label for="location">location:</label>
        <input type="text" name="location" v required>

        
    <label for="imageurl">imageurl:</label>
        <input type="text" name="image" v required> 

       <label for="discription">discription:</label>
        <input type="text" name="discription"  required> 

        <button type="submit">Bijwerken</button>
    </form>
@endsection
    