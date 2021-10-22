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
                <th scope="col">Categoria</th>
                <th scope="col">Autore</th>
                <th scope="col">Scritto il: </th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>

                @if(is_numeric($post->category_id))
                <td><span class="badge px-3 badge-warning">{{ $post->category->name }}</span></td>
                @else
                <td><span class="badge px-3 badge-warning"> Nessuna categoria </span></td>
                @endif
                <td> @if($post->user) {{ $post->user->name }} @else Sconosciuto @endif </td>
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

<section id="post-by-categories" class="container">
    <div class="row">
            @foreach ($categories as $category)
                <div class="col-4">
                    <h5 class="my-4">{{ $category->name }}</h5>


                      @forelse ($category->posts as $post)
                           <li><a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a></li>
                           @empty <li>Nessun post associato a questa categoria</li>
                       @endforelse 

                    
                </div>
            @endforeach
    </div>
</section>




@endsection
