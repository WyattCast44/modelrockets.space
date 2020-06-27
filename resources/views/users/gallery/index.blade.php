@extends('users.layout')

@section('user-content')

    <div class="container mb-16">

        @if(auth()->check() && auth()->user()->id === $user->id)
            <livewire:users.gallery.upload>
        @endif
        
        @if($attachments->count() > 0)

            <div class="grid grid-cols-3 gap-4 mb-10">
            
                @foreach ($attachments as $attachment)
                
                    <a href="{{ $attachment->url_raw }}" class="glightbox">
                        <div class="h-40 bg-gray-100 bg-center bg-no-repeat bg-cover rounded" style="background-image: url({{ $attachment->url_medium }})">
                        </div>
                    </a>
        
                @endforeach

            </div>
            
            {{ $attachments->links() }}
        
        @else

            <div class="flex flex-col items-center justify-center px-10">
                <h2 class="mb-8 text-3xl font-semibold text-center text-gray-500">{{ $user->username }} hasn't uploaded any photos yet</h2>
                @svg('photo', 'w-64 h-64')
            </div>

        @endif
                
    </div>

@endsection