@extends('layoutHome')

@section('content')

    <form action="{{ route('post.store') }}" method="POST">
        @csrf
        <label for="">Description</label>
        <input type="text" name="description">

        <label for="">Picture</label>
        <input type="text" name="picture">

        <button type="submit">Enregistrer</button>
    </form>

@endsection