@extends('layoutHome')

@section('title', 'PostDétail')
@section('content')

    <h1>Bonjour</h1>

    <div class="content">
        <h2>{{ $post -> id }}</h2>
        <p>{{ $post -> description }}</p>
        <a href="{{ route('home.all') }}">Revenir à la page d'accueil</a>
    </div>

@endsection