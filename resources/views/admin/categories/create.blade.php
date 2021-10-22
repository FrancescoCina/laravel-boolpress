@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crea il tuo nuovo post</h1>
     {{--  @if($errors->any())

      <div class="alert alert-danger">
        <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
      </ul>
      </div>

      @endif --}}

        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
              <label for="name">Nome Categoria</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
              <label for="color">Colore</label>
              <input type="text" class="form-control" id="color" name="color">
            </div>                        
            <button type="submit" class="btn btn-success">Salva</button>
          </form>
    </div>
@endsection