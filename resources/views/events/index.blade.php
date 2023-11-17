@extends('layouts.app')
@extends('layouts.layout')

@section('content')

<!-- Add FontAwesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<div class="row">
    <div class="col-md-12">
        <div class="card-index">
            <div class="plusIcon mt-3">
                <i class="fas fa-plus"></i>
                <button><a class="nav-link" href="{{ route('events.create') }}">Create</a></button>
            </div>
            <div class="card-body bg-light"> <!-- Voeg de klasse "bg-light" toe voor de achtergrondkleur -->
                <table class="border-collapse w-full tabular-nums">
                    <thead>
                        <tr class="bg-yellow-50">
                            <th>ID</th>
                            <th>Title</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Location</th> 
                            <th></th>   
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($events as $event)
                            <tr class="event even:bg-gray-200">
                                <td>{{ $event->id }}</td>
                                <td>{{ $event->title }}</td>
                                <td>{{ $event->date->format('d-m-Y') }}</td>
                                <td>{{ $event->time }}</td>
                                <td>{{ $event->location }}</td>
                                <td class="text-center">
                                    <i class="fas fa-pen-to-square"></i>
                                </td>
                                <td><a class="btn btn-success" href="{{ route('events.edit', ['id' => $event->id]) }}"> <i class="fas fa-edit"></i></a></td>
                                <td>
                                    <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this event?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

   
</div>

@endsection
