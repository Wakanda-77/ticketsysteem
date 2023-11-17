

@extends('layouts.app') {{-- Je kunt 'app' vervangen door de naam van je layout --}}

@section('content')
    

    <form action="{{ route('users.store') }}" method="POST" >
        @csrf
        <div class="wrapper">
        
              <h1>Bewerk evenement</h1>
              
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Name</span>
            <input type="text" class="form-control"   name="name"  required>
      
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">E-mail</span>
              <input type="email" class="form-control" name="email"  required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">password</span>
                <input type="password" class="form-control" name="password"  required>
              </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
              
        </div>
        </form>

       

      
        
    

        
           
    
@endsection
    