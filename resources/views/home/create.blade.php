@extends('base')

@section('content')

    <form action="{{ route('home.store_data') }}" method="post">
        <label for="">Description</label>
        <input type="text" name="description">

        <label for="">Picture</label>
        <input type="text" name="picture">

        <button type="submit">Enregistrer</button>
    </form>

@endsection