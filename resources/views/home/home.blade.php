@extends('base')

@section('title', 'Accueil')
@section('content')

    <h1>Bonjour {{ $user -> name }}</h1>

    <!-- home.blade.php -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('home.all') }}" method="GET">
        @csrf
        <input type="search" name="search" id="">
        <button type="submit">Rechercher</button>
    </form>

    <div class="w3-quarter w3-border w3-padding">
        <a href="{{ route('post.create') }}"> Ajouter une nouvelle post</a>
        <p>Trier par :</p>
        <ul>
            <li><a href="{{ route('home.all_order_by_id') }}">Id</a></li>
            <li><a href="">Description</a></li>
            <li><a href="">Picture</a></li>
            <li><a href="{{ route('home.all_order_by_created_date') }}">Date de création</a></li>
            <li><a href="{{ route('home.all_order_by_updated_date') }}">Date de modification</a></li>
        </ul>
    </div>

    <div class="content w3-half w3-border w3-padding">
        @if( isset($posts) )

            <ul>
            @foreach( $posts as $post )
                    <li class="liPost">
                        <div class="info">
                            <img class="user_pic" src="/users/utilisateur.png" alt="">
                            <div class="">
                                <span>
                                    @if( Auth::id() === $post -> user_id) 
                                        You 
                                    @else 
                                        {{ $post -> user -> name }} 
                                    @endif 
                                </span><br>
                                <span id="created_at">created at : {{ $post -> created_at }}</span>
                            </div>
                        </div>
                        
                        <br>
                        
                        <div class="post">
                            <a href="{{ route('home.post', ['id' => $post -> id]) }}">{{ $post -> description }}</a> 

                            <div class="action">
                                @if( $post -> user_id === Auth::id() )
                                <a href="{{ route('post.update', ['id' => $post -> id]) }}"><button class="actionButton"><img class="" src="/icons/modifier.png" alt=""></button></a>
                                <form action="{{ route('post.delete_store', ['id' => $post -> id]) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="actionButton"><img src="/icons/supprimer.png" alt=""></button>
                                </form>
                                @endif
                            </div>
                        </div>
                        <img class="postImg" src="/posts/téléchargement.jpg" alt="">
                        <hr>
        
                    </li>
            @endforeach
            </ul>

        @else

            @foreach( $posts as $post )
                <ul>
                    <li>{{ $post -> user -> email }} : 
                        created at : {{ $post -> created_at }}
                        <a href="{{ route('home.post', ['id' => $post -> id]) }}">{{ $post -> description }}</a> 

                        @if( $post -> user_id === Auth::id() )
                        <a href="{{ route('post.update', ['id' => $post -> id]) }}"><button>Modifier</button></a>
                        <form action="{{ route('post.delete_store', ['id' => $post -> id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button>Supprimer</button>
                        </form>
                        @endif
                    </li>
                </ul>
            @endforeach

        @endif
    </div>

@endsection