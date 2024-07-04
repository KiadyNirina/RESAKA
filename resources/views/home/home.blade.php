@extends('base')

@section('title', 'Accueil')
@section('content')

    <h1>Bonjour</h1>

    <div class="content">
        @foreach( $posts as $post )
            <ul>
                <li><a href="{{ route('home.post', ['id' => $post -> id]) }}">{{ $post -> description }}</a></li>
            </ul>
        @endforeach
    </div>

@endsection