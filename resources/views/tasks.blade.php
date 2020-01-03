@extends('layout')

@section('title', 'My Tasks')

@section('content')

    <p>
        <form method="POST" action="/tasks">
            {{ csrf_field() }}
            <input type="text" name="title" placeholder="Add new task..."/>
            <input type="submit" value="Add"/>
        </form>
    </p>

    {{-- <ul style="text-align: left;">
        <li> --}}
            <table style="text-align: left; width: 100%">
                @foreach ($tasks as $t)
                    <tr>
                        <td style="width: 60%">
                            &bull; 
                            <span
                                @if ($t->completed)
                                    style="text-decoration: line-through;"
                                @endif
                            >
                            {{ $t->title }}
                            </span>
                        </td>
                        <td>
                            @if (!$t->completed)
                                <a href="/tasks/{{$t->id}}/toggleComplete">Mark Done</a>
                            @else 
                                <a href="/tasks/{{$t->id}}/toggleComplete">Mark Undone</a>
                            @endif
                        </td>
                        <td>
                            <a href="/tasks/{{$t->id}}/edit">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
            {{-- </li>
    </ul> --}}

@endsection