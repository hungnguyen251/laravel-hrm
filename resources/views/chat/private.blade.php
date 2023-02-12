@extends('client_layout')
@section('title', 'Chat')

@section('content')
<link rel="stylesheet" href="{{ asset('dist/css/chat.css') }}">
<div id="app">
    <private-chat :user="{{auth()->user()}}"></private-chat>
</div>
@endsection