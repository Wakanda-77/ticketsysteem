@extends('layouts.admin')
@extends('layouts.layout')
@section('content')
<div class="row">
    <table class="border-collapse w-full tabular-nums">
       
        <tr class="bg-yellow-50">
            <th>Titel</th>
            <th>Datum</th>
            <th>Tijd</th>
            <th>Locatie</th>
            <th>Prijs</th>
            <th>edit</th>
            <th>delete</th>

           
        </tr>
        
        @foreach($events as $event)
        
            <tr class="even:bg-gray-200">
                <td>{{ $event->title }}</td>
                <td>{{ $event->date->format('d-m-Y') }}</td>
                <td>{{ $event->time }}</td>
                <td>{{ $event->location }}</td>
                {{-- <td class="text-right">€{{ $event->price }}</td> --}}
                <td class="text-center">
                    <i class="fa-regular fa-pen-to-square"></i>
                </td>
                <td><a href="{{ route('events.edit', ['id' => $event->id]) }}">Bewerk evenement</a></td>
                <td><form action="{{ route('events.destroy', $event->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                
                    <button type="submit" onclick="return confirm('Weet je zeker dat je dit evenement wilt verwijderen?')">Verwijder</button>
                </form></td>
            </tr>
            
        @endforeach
        
    
    </table>
</div>
@endsection

