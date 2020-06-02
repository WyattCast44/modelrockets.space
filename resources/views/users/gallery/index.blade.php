@extends('users.layout')

@section('user-content')

    <div class="container mb-16">

        @if(auth()->check() && auth()->user()->id === $user->id)
            <div class="flex mb-10">
                <a href="#" class="btn btn-outline-primary" disabled>Upload Pictures</a>
            </div>
        @endif
        
        <ul>

            @foreach ($attachments as $attachment)
    
                Image
    
            @endforeach
            
        </ul>

        {{ $attachments->links() }}
        
    </div>

@endsection