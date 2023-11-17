

@extends('layouts.app') {{-- Je kunt 'app' vervangen door de naam van je layout --}}

@section('content')
   

    <form action="{{ route('events.update', $event->id) }}" method="POST"  enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="wrapper">
        <h1>Bewerk evenement</h1>
        <div class="input-group mb-3">
        <span class="input-group-text" for="title">Titel:</span>
        <input type="text" class="form-control" name="title" value="{{ old('title', $event->title) }}" required>
        </div>

        <div class="input-group mb-3">
        <span class="input-group-text" for="date">Datum:</span>
        <input type="date" class="form-control" name="date" value="{{ old('date', $event->date->format('Y-m-d')) }}" required>
        </div>

        <div class="input-group mb-3">
        <span class="input-group-text" for="time">Tijd:</span> 
        <input type="text" class="form-control" name="time" value="{{ old('time', $event->time) }}" required>
        </div>

        <div class="input-group mb-3">
        <span class="input-group-text" for="location">Locatie:</span>
        <input type="text" class="form-control" name="location" value="{{ old('location', $event->location) }}" required>
        </div>
        
        <div class="input-group mb-3">
        <span class="input-group-text" for="discription">description:</span>
        <input type="text" class="form-control" name="discription" value="{{ old('discription', $event->discription) }}" required>
        </div>

        <div class="mb-3 form-check">
            <input type="file" class="form-control" name="image">
        </div>
        

        <button type="submit" class="btn btn-primary">Bijwerken</button>
        </div>
    </form>
    
@endsection
