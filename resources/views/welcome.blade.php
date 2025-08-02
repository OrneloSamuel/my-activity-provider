@extends('layouts.layout')

@section('content')
    <div class="home">
        @for ($i = 0; $i <= 8; $i++)
            <div class="block">
                <p class="number">CONFIGURAÇÃO</p>
                <p class="description">Activity Provider</p>
            </div>
        @endfor
    </div>
@endsection