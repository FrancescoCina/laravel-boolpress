@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1>I miei post</h1>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-success">Crea un nuovo post</a>
    </div>

    @if(session('alert'))

    <div class="alert alert-success">
        {{ session('alert') }}
    </div>

    @endif

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Titolo</th>
                <th scope="col">Scritto il: </th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>{{ $post->getFormattedDate($post->created_at, 'd-m-Y') }}</td>
                <td colspan="2" class="d-flex">
                    <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">Dettagli</a>
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning mx-2">Modifica</a>
                    <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Cancella</button>
                    </form>
                </td>
            </tr>
            @empty
                <tr><td colspan="3" class="text-center">Non ci sono post da visualizzare</td></tr>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-end">
        {{ $posts->links() }}
    </div>
</div>

@endsection
