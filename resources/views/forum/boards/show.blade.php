@extends('forum.layout')

@section('page-title', 'Forum: ' . $board->name)

@section('forum-page')

    {{ $board->name }}

@endsection