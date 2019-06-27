@extends('layouts.app')

@section('page-title', $thread->title)

@section('content')

<header class="border-b border-solid border-gray-300 bg-gray-200 py-6 sticky top-0 shadow-md mb-8" style="z-index:1000">

    <div class="container">
        <p class="text-sm text-gray-700">
            <a href="{{ route('forum.index') }}">Forum</a> /
            <a href="{{ route('boards.show', $board) }}">{{ $board->name }}</a> /
        </p>
        
        <h1 class="text-xl mb-0">
            {{ $thread->title }}
        </h1>
    </div>

</header>

<div class="container mb-12">

    <div class="flex mb-5">
        <a href="{{ $thread->path() }}">&leftarrow; Back to thread</a>
    </div>

    <!-- Original Post -->
    <div class="rounded border-2 border-solid p-8 mb-4 border-blue-300 bg-blue-100 relative">
        <p class="absolute top-0 right-0 p-2 text-xs uppercase text-blue-600">Original Post</p>
        
        <h2 class="mb-2 font-semibold text-lg text-blue-900">{{ $thread->title }} </h2>
        {!! $thread->body !!}
    </div>

    <!-- Parent? -->
    @if($parent && $parent <> null)
        <div class="rounded border-2 border-solid p-8 mb-4 border-green-300 bg-green-100 relative">
            <p class="absolute top-0 right-0 p-2 text-xs uppercase text-green-600">Your Replying To</p>
            {!! $parent->body !!}
        </div>
    @endif


    <form action="{{ $thread->repliesPath('store') }}" method="post" enctype="multipart/form-data">

        @csrf
        @honeypot

        @if($parent && $parent <> null)
            <input type="hidden" name="parent_id" value="{{ $parent->id }}" required autocomplete="false">
        @endif

        <div class="form-group">
            <label for="body">Your Reply</label>
            <textarea name="body" id="body" rows="10" class="form-control" placeholder="Your thoughts..." autofocus></textarea>
        </div>

        <div class="form-group" data-controller="multifile">
            <label for="attachments[]" class="text-lg text-gray-600">Attachments</label>
        
            <div class="custom-file">
                <input
                    type="file"
                    data-target="multifile.source"
                    data-action="change->multifile#handle"
                    class="custom-file-input"
                    name="attachments[]"
                    id="attachments"
                    multiple
                />
        
                <label class="custom-file-label" for="attachments[]" data-target="multifile.text"
                    >Choose file(s)</label
                >
            </div>

            @error('attachments.*')
                <small class="text-red-400 font-semibol">{{ $message }}</small>
            @enderror
        
            <div class="-mx-2" data-target="multifile.listContainer">
                <li
                    data-target="multifile.listTemplate"
                    class="mx-2 mb-2 p-2 bg-gray-200 text-xs hidden border border-solid border-gray-300 rounded"
                ></li>
                <ul data-target="multifile.list" class="list-none flex my-4 flex-wrap"></ul>
            </div>

        </div>    

        <div class="form-group flex justify-end">
            <a href="{{ $thread->path() }}" class="btn btn-link">Cancel</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>

</div>

@endsection