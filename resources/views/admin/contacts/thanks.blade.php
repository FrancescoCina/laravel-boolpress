@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('alert-message'))
        <div class="alrt alert-{{ session('aler-type') }}">
            <h1>{{ session('alert-message') }}</h1>
        </div>
        @endif
</div>
@endsection