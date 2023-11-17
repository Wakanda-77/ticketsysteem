@extends('layouts.app')
@extends('layouts.layout')
@section('content')
<div class="row">
    <table class="border-collapse w-full tabular-nums">
       
        <tr class="bg-light">
            <th>#iD</th>
            <th>Name</th>
            <th>Gmail</th>
            <th>DELETE</th>
           
           
        </tr>
        <i class="fa-solid fa-plus"></i>
        <a class="nav-link" href="{{route('users.create')}}">create</a>

        @foreach($users as $user)
        
            <tr class="bg-light">
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td><a class="btn btn-success" href="{{ route('users.edit', ['id' => $user->id]) }}">edit</a></td>

                <form action="{{ route('events.destroy', $user->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                
                    <td><button type="submit" class="btn-close" onclick="return confirm('Weet je zeker dat je dit evenement wilt verwijderen?')"></button></td>
                </form>
            </tr>
            
        @endforeach
        
    
    </table>
</div>
@endsection

