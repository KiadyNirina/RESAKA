@extends('base')

@section('title', 'PostDétail')
@section('content')

    <h1>Bonjour</h1>

    <div class="content">
        <h2>{{ $post -> id }}</h2>
        <p>{{ $post -> description }}</p>
    </div>

@endsection