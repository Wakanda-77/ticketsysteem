@extends('layouts.admin')

@section('content')
<div class="row">
    <img src="{{ asset('img/dashboard.png') }}" class="card-img-top" alt="Dashboard Image">
<div class="card">
    <div class="card-body">
      This is some text within a card body.
    </div>
    <a href="{{route('events.index')}}">test</a>
  </div> 
</div>

@endsection