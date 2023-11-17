

@extends('layouts.app') {{-- Je kunt 'app' vervangen door de naam van je layout --}}

@section('content')
   

    <form action="{{ route('users.update', $users->id) }}" method="POST"  >
        @csrf
        @method('PUT')
        <div class="wrapper">
        <h1>Bewerk evenement</h1>
        <div class="input-group mb-3">
        </div>
        

        <div class="input-group mb-3">
        <span class="input-group-text" for="text">Name:</span>
        <input type="text" class="form-control" name="name" value="{{ old('name', $users->name) }}" required>
        </div>

        <div class="input-group mb-3">
        <span class="input-group-text" for="email">E-mail:</span> 
        <input type="email" class="form-control" name="email" value="{{ old('email', $users->email) }}" required>
        </div>

       
        

        <button type="submit" class="btn btn-primary">Bijwerken</button>
        </div>
    </form>
    
@endsection
