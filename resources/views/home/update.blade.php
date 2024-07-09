@extends('base')

@section('content')

    <form action="{{ route('post.update_store', ['id' => $form -> id]) }}" method="POST">
        @csrf
        <label for="">Description</label>
        <input type="text" name="description" value="{{ $form -> description }}">

        <label for="">Picture</label>
        <input type="text" name="picture" value="{{ $form -> picture }}">

        <button type="submit">Modifier</button>
    </form>

@endsection