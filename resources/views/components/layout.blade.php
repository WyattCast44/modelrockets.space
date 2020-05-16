@extends($name)

@section('page-title', $title)

@section($section)

    {{ $slot }}
    
@endsection