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
}
