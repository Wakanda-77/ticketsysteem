

@extends('layouts.app') {{-- Je kunt 'app' vervangen door de naam van je layout --}}

@section('content')
    

    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="wrapper">
        
              <h1>Bewerk evenement</h1>
              
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">title</span>
            <input type="text" class="form-control"   name="title"  required>
      
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Datum</span>
              <input type="date" class="form-control" name="date"  required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Tijd</span>
              <input type="text" class="form-control" name="time"  required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">location</span>
              <input type="text" class="form-control" name="location"  required>
      
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">description </span>
            <input type="text" class="form-control" name="discription"  required> 

      
            </div>
            <div class="input-group">
              <input type="file" class="form-control" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
              
        </div>
        </form>

       

      
        
    

        
           
    
@endsection
    