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

    public function all_order_by_created_date() {
        $posts = new Post();
        return view('home.all', [
            "posts" => $posts -> orderBy('created_at', 'desc') -> get()
        ]);
    }

    public function post( string $id ) {
        $post = new Post();
        return view('home.post', [
            'post' => $post -> findOrFail($id)
        ]);
    }

    public function create() {
        return view('home.create');
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

        return redirect() -> route('home.all') -> with('success', 'Données ajoutées avec succès.');
    }

    public function update( string $id ) {
        $form = Post::find( $id );
        return view('home.update', [
            "form" => $form
        ]);
    }

    public function update_store( Request $request, string $id ) {
        $uptadedData = Post::find( $id );

        $this -> validate($request, [
            'description' => 'required|string|max:255',
            'picture' => 'required|string|max:255'
        ]);

        $uptadedData -> description = $request -> input('description');
        $uptadedData -> picture = $request -> input('picture');

        $uptadedData -> save();

        return redirect() -> route('home.all') -> with('success', 'Données mises à jour avec succès.');
    }

    public function delete_store( string $id ) {
        $form = Post::find( $id );
        $form -> delete();
        return redirect() -> route('home.all') -> with('success', 'Supprimée avec succès.');
    }
}
