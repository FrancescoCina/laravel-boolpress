@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="d-flex justify-content-end align-items-center">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Crea nuova categoria</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Colore</th>
                    <th scope="col">id</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->color }}</td>
                    <td>{{ $category->id }}</td>
                    <td colspan="2" class="d-flex">
                        <a href="{{ route('admin.categories.show', $category->id) }}" class="btn btn-primary">Dettagli</a>
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning mx-2">Modifica</a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST">
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
    </div>


@endsection