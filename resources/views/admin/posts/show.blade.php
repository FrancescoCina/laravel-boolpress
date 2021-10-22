@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary">Indietro</a>
    <div class="mt-3">
        <h3>{{$post->title}}</h3>
        <small>@if($post->user){{ $post->user->name }} @else Anonimo @endif</small>
        <p>{{ $post->content }}</p>
        <img src="{{ $post->image }}" alt="{{ $post->title }}">
    </div>
</div>

@endsection