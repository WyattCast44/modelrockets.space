@extends('users.layout')

@section('user-content')

    <div class="container">
        <ul>
            @foreach($flights as $flight)
                <li>{{ $flight->motors }}</li>
            @endforeach
        </ul>
    </div>

@endsection