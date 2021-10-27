@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Contatti</h1>
    </div>

       {{-- @if(session('alert-message'))
    <ul class="alert alert-{{ session('alert-type') }}">
      <li>{{ session('alert-message') }}</li>
    </ul>
    @endif --}}
    
    <a href="{{ route('admin.contacts.create') }}" class="btn btn-success">Crea nuovo contatto</a>


    <table class="table">
        <thead>
            <tr>

                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @forelse ($leads as $lead)
            <tr>
                <td>{{ $lead->name }}</td>
                <td> {{ $lead->email }} </td>               
             {{--    <td colspan="2" class="d-flex">
                    <a href="{{ route('admin.users.edit', $lead->id) }}" class="btn btn-warning mx-2">Gestisci Utenti</a>
                </td> --}}
            </tr>
            @empty
                <tr><td colspan="3" class="text-center">Non ci sono contatti da visualizzare</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection