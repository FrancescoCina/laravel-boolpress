@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crea il tuo nuovo post</h1>
      @if($errors->any())

      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
      </ul>
      </div>

      @endif

        <form action="{{ route('admin.posts.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="title">Titolo</label>
              <input type="text" class="form-control" id="title" name="title">
            </div>
            <div class="form-group">
              <label for="content">Contenuto</label>
              <input type="text" class="form-control" id="content" name="content">
            </div>
            <div class="form-group">
                <label for="image">Immagine</label>
                <input type="text" class="form-control" id="image" name="image">
              </div>

            <button type="submit" class="btn btn-success">Salva</button>
          </form>
    </div>
@endsection