@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-secondary">Indietro</a>
    <div class="mt-3">
        <h3>{{$category->name}}</h3>
        <p>{{ $category->color }}</p>
        <p>{{ $category->id }}</p>
        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning mx-2">Modifica</a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Cancella</button>
                        </form>
    </div>
</div>

@endsection