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

    <a href="{{ route('post.create') }}"> Ajouter une nouvelle post</a>

    <div class="content">
        @foreach( $posts as $post )
            <ul>
                <li><a href="{{ route('home.post', ['id' => $post -> id]) }}">{{ $post -> description }}</a> <a href="{{ route('post.update', ['id' => $post -> id]) }}"><button>Modifier</button></a>
                <form action="{{ route('post.delete_store', ['id' => $post -> id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button>Supprimer</button>
                </form>
                </li>
            </ul>
        @endforeach
    </div>

@endsection