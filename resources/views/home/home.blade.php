@extends('base')

@section('title', 'Accueil')
@section('content')

    <h1>Bonjour</h1>

    <!-- home.blade.php -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('home.create_post') }}"> Ajouter une nouvelle post</a>

    <div class="content">
        @foreach( $posts as $post )
            <ul>
                <li><a href="{{ route('home.post', ['id' => $post -> id]) }}">{{ $post -> description }}</a></li>
            </ul>
        @endforeach
    </div>

@endsection