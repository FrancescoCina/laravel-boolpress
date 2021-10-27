@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crea un nuovo contatto</h1>
 {{--  @if($errors->any())

  <div class="alert alert-danger">
    <ul>
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
  </ul>
  </div>

  @endif --}}

    <form action="{{ route('admin.contacts.store') }}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Nome Contatto</label>
          <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="form-group">
          <label for="email">Indirizzo Email</label>
          <input type="text" class="form-control" id="email" name="email">
        </div>             
         <div class="mb-3">
            <label for="body">Textarea</label>
            <textarea class="form-control @error('leads') is-invalid @enderror" id="body" name="body" placeholder="Scrivi messaggio..."></textarea>
        </div>
        <button type="submit" class="btn btn-success">Invia</button>
      </form>
</div>
@endsection