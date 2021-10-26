@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Utenti</h1>
    </div>

    @if(session('alert'))

    <div class="alert alert-success">
        {{ session('alert') }}
    </div>

    @endif

    
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Ruolo</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td> {{ $user->email }} </td>               
                <td>
                    @forelse ($user->roles as $role)
                    <span class="badge px-3 badge-pill" style="background-color: {{ $role->color }}"> {{ $role->name }} </span>
                    @empty
                        <span>Nessuno ruolo per questo utente</span>
                    @endforelse
                </td>
                <td colspan="2" class="d-flex">
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning mx-2">Gestisci Utenti</a>
                </td>
            </tr>
            @empty
                <tr><td colspan="3" class="text-center">Non ci sono post da visualizzare</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection