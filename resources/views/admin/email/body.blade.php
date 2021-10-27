@extends('layouts.app')

@section('content')
    <p>Caro {{$lead->name}},
    <br>
        {{ $lead->body }}
    </p>

@endsection
