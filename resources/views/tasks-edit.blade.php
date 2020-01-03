@extends('layout')

@section('title', 'My Tasks')

@section('content')

    <p>
        <form method="POST" action="/tasks/{{ $t->id }}">
            {{-- it's a POST request but we FAKE it as a PATCH to match our RESTful route --}}
            {{ method_field('PATCH') }}
            {{ csrf_field() }}
            <input type="text" name="title" value="{{ $t->title }}" placeholder="Enter new task name..."/>
            <input type="submit" value="Save"/>
        </form>

        <form method="POST" action="/tasks/{{ $t->id }}">
            {{-- it's a POST request but we FAKE it as a DELETE to match our RESTful route --}}
            @method('DELETE')
            @csrf
            
            <input type="submit" value="Delete"/>
        </form>
    </p>

@endsection