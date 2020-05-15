@extends('layouts.skeleton')

@section('main')

    @yield('content')

    @guest
        @include('_partials.register')
    @endguest

@endsection