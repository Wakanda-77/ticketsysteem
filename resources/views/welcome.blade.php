<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <div class="row">
        {{-- Abdullllllllll --}}
    @foreach ($events as $event)
        
        <div class="col-sm-4">
          <div class="card">
            <div class="card-body">
                <img class="card-img-top" src="" alt="Card image cap">
                <h5 class="card-title">{{$event->title}}</h5>
                <p class="card-text">{{$event->discription}}</p>
                <p class="card-text">{{$event->date}}</p>             
                <p class="card-text">{{$event->time }}</p>
                <a class="btn btn-primary" href="">submit</a>
              
              
              
            </div>
          </div>
        </div>
    
    @endforeach
    </div>
    
    @endsection
</body>
</html>