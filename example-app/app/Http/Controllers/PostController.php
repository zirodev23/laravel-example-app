<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index() {
        //metode, kas atgriež visus Post ierakstus
        $posts = Post::all();
        // dd($posts);
        // \Log::debug($posts);
        return view('posts.index', ['allposts' => $posts]);
    }

    public function show(Post $post) {
        return view('posts.show', ['singlepost' => $post]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        \Log::debug($request);
        
        $data = [
            'author' => $request->author,
            'title' => $request->title,
            'content' => $request->content
        ];

        Post::create($data);

        return "to be implemented";
        // mājās izveidot jaunu Post ierakstu datubāzē
    }
}
