@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1>I miei post</h1>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-success">Crea un nuovo post</a>
    </div>

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
                <td><a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-primary">Dettagli</a></td>
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
