<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function all() {
        $posts = new Post();
        return view('home.home', [
            "posts" => $posts -> all()
        ]);
    }

    public function post( string $id ) {
        $post = new Post();
        return view('home.post', [
            'post' => $post -> findOrFail($id)
        ]);
    }

    public function store( Request $request ) {
        $validatedData = $request -> validate([
            'description' => 'required|string|max:255',
            'picture' => 'required|string|max:255'
        ]);

        $newData = new Post();
        $newData -> description = $validatedData['description'];
        $newData -> picture = $validatedData['picture'];

        $newData -> save();

        return redirect() -> route('home') -> with('success', 'Données ajoutées avec succès.');
    }

    public function create_post() {
        return view('home.create');
    }
}
