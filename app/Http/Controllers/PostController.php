<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(15);
        return view('posts/index', compact('posts'));
    }

    public function create()
    {
        return view('posts.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|min:3',
            'body' => 'required|min:3|max:50'
        ]);
        var_dump($request);exit();
        Post::create($request->all());
        return redirect()->route('all-posts');
    }

}
