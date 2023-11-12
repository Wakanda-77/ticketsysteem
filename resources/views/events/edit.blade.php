

@extends('layouts.app') {{-- Je kunt 'app' vervangen door de naam van je layout --}}

@section('content')
    <h1>Bewerk evenement</h1>

    <form action="{{ route('events.update', $event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="title">Titel:</label>
        <input type="text" name="title" value="{{ old('title', $event->title) }}" required>

        <label for="date">Datum:</label>
        <input type="date" name="date" value="{{ old('date', $event->date->format('Y-m-d')) }}" required>

        <label for="time">Tijd:</label>
        <input type="text" name="time" value="{{ old('time', $event->time) }}" required>

        <label for="location">Locatie:</label>
        <input type="text" name="location" value="{{ old('location', $event->location) }}" required>

        {{-- <label for="price">Prijs:</label>
        <input type="number" name="price" value="{{ old('price', $event->price) }}" required> --}}

        <button type="submit">Bijwerken</button>
    </form>
    
@endsection
