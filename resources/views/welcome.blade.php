@extends('layouts.app')
@extends('layouts.layout')

@section('content')
    <div class="row">
        <!-- Include Font Awesome for icons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

        @foreach ($events as $event)
            <div class="col-sm-4">
                <div class="cardIndex">
                    <div class="img card-img-top">
                        <img src="{{ $event->image }}" alt="{{ $event->title }}" class="img-fluid">
                    </div>
                    <div class="card-body">
                        
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <p class="card-text">{{ $event->description }}</p>
                        <div class="timeIcone">
                            <i class=" m-20 fas fa-calendar-days"></i>
                            {{ $event->date->format('d-m-Y') }}
                        </div>
                        <div class="logo-time">
                            <i class="far fa-clock"></i>
                            <p class="card-text">{{ $event->time }}</p>
                        </div>
                        <div>
                            
                            <p class="card-text">{{ $event->location }}</p>
                        </div>
                        <div>
                            
                            <p class="card-text">{{ $event->discription }}</p>
                        </div>
                        
                        <a class="btn btn-primary" href="#">boek<i class="fas fa-check"></i></a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
