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
      {{-- @dd($categories); --}}
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

              <div class="form-check form-check-inline my-3">
                @foreach ($tags as $tag)
                    
                <input class="form-check-input mx-2" type="checkbox" id="tags-{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]" @if(in_array($tag->id, old('tags',[]))) checked @endif>
                <label class="form-check-label" for="tags-{{ $tag->id }}">{{ $tag->name }}</label>
                @endforeach
              </div>






              <div class="form-group">  
                <label for="category_id">Scegli Categoria</label>
                <select class="form-control" id="category_id" name="category_id">
                  <option value="">Nessuna Categoria</option>
                  @foreach ($categories as $category)
                      
                  <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                </select>
              </div>
                        
            <button type="submit" class="btn btn-success">Salva</button>
          </form>
    </div>
@endsection