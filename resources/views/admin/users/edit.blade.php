@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gestisci Utenti</h1>
        {{-- @if($errors->any())

        <div class="alert alert-danger">
          <ul>
          @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
          @endforeach
        </ul>
        </div>
  
        @endif --}}

        {{-- 
            
            action="{{ route('admin.users.update', $user->id) }}"
            
            --}}


        <form  method="POST">
            @method('PATCH')
            @csrf
           

            <div class="form-check form-check-inline">
                @foreach($roles as $role)
                <input class="form-check-input" type="checkbox" id="role-{{ $role->id }}" value="{{ $role->id }}" name="roles[]" @if(in_array($role->id, $roles_ids)) checked @endif>
                <label class="form-check-label" for="role-{{ $role->id }}">{{ $role->name }}</label>
                @endforeach
              </div>

 



             {{--  <div class="form-check form-check-inline my-3">
                @foreach ($tags as $tag)
                    
                <input class="form-check-input mx-2" type="checkbox" id="tags-{{ $tag->id }}" value="{{ $tag->id }}" name="tags[]" @if(in_array($tag->id, old('tags',$tagIds ?? []))) checked @endif>
                <label class="form-check-label" for="tags-{{ $tag->id }}">{{ $tag->name }}</label>
                @endforeach
              </div> --}}

 

            <button type="submit" class="btn btn-success">Salva</button>
          </form>
    </div>
@endsection