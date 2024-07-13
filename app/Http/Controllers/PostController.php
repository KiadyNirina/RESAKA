<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\AssignOp\Pow;

class PostController extends Controller
{
    public function all(Request $request) {
        $posts = new Post();
        $user = Auth::user();
        $query = $request -> input('search');

        if( !Auth::check() ) {
            return redirect() -> route('register.login');
        } 

        if( $query ) {
            $results = $posts -> with('user') -> where('description', 'LIKE', "%{$query}%") -> get();
        } else {
            $results = $posts -> with('user') -> get();
        }

        return view('home.home', [
            "posts" => $results,
            "user" => $user
        ]);
    }

    public function all_order_by_created_date() {
        $posts = new Post();
        $user = Auth::user();
        return view('home.home', [
            "posts" => $posts -> orderBy('created_at', 'asc') -> get(),
            "user" => $user
        ]);
    }

    public function all_order_by_updated_date() {
        $posts = new Post();
        $user = Auth::user();
        return view('home.home', [
            "posts" => $posts -> orderBy('updated_at', 'desc') -> get(),
            "user" => $user
        ]);
    }

    public function all_order_by_id() {
        $posts = new Post();
        $user = Auth::user();
        return view('home.home', [
            "posts" => $posts -> orderBy('id', 'asc') -> get(),
            "user" => $user
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
        $user = auth() -> user();

        $newData -> description = $validatedData['description'];
        $newData -> picture = $validatedData['picture'];
        $newData -> user_id = $user -> id;

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
        $uptadedData -> updated_at = now();

        $uptadedData -> save();

        return redirect() -> route('home.all') -> with('success', 'Données mises à jour avec succès.');
    }

    public function delete_store( string $id ) {
        $form = Post::find( $id );
        $form -> delete();
        return redirect() -> route('home.all') -> with('success', 'Supprimée avec succès.');
    }
}
