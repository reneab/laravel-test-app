@extends('layout')

@section('content')
    <h2>Hello {{ $name }}!</h2>

    @if ($number)
        <h3>Your ID is {{ $number }}</h3>
    @endif
@endsection