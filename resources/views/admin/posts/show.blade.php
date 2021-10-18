@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-secondary">Indietro</a>
    <div class="mt-3">
        <h3>{{$post->title}}</h3>
        <p>{{ $post->content }}</p>
    </div>
</div>

@endsection