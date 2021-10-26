@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Gestisci Utenti</h1>       
        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @method('PATCH')
            @csrf
              <div class="form-check form-check-inline">
                @foreach($roles as $role)
                <input class="form-check-input mx-2" type="checkbox" id="role-{{ $role->id }}" value="{{ $role->id }}" name="roles[]" @if(in_array($role->id, old('roles', $roles_ids))) checked @endif>
                <label class="form-check-label" for="role-{{ $role->id }}">{{ $role->name }}</label>
                @endforeach
              </div>
            <button type="submit" class="btn btn-success">Salva</button>
          </form>
    </div>
@endsection