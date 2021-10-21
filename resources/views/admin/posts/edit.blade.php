@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Modifica il tuo post</h1>
        @if($errors->any())

        <div class="alert alert-danger">
          <ul>
          @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
          @endforeach
        </ul>
        </div>
  
        @endif

        <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="form-group">
              <label for="title">Titolo</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
            </div>
            <div class="form-group">
              <label for="content">Contenuto</label>
              <input type="text" class="form-control" id="content" name="content" value="{{ $post->content }}">
            </div>
            <div class="form-group">
                <label for="image">Immagine</label>
                <input type="text" class="form-control" id="image" name="image" value="{{ $post->image }}">
              </div>
              <div class="form-group">  
                <label for="category_id">Scegli Categoria</label>
                <select class="form-control" id="category_id" name="category_id">
                  <option>Nessuna Categoria</option>
                  @foreach ($categories as $category)
                      
                  <option @if(old('category_id', $post->category_id) == $category->id ) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>

            <button type="submit" class="btn btn-success">Salva</button>
          </form>
    </div>
@endsection