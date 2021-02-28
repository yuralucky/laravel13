<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(15);
        return view('posts/index', compact('posts'));
    }

    public function showPostByAuthor($author)
    {
        $posts = Post::where('user_id', $author)->paginate(10);
        return view('posts/index', compact('posts'));
    }

    public function showAllPostByAuthorAndByCategory($author, $category)
    {
        $posts = Post::where('user_id', $author)->where('category_id', $category)->paginate(10);
        return view('posts/index', compact('posts'));

    }

    public function showPostByCategory($author)
    {
        $posts = Post::where('category_id', $author)->paginate(10);
        return view('posts/index', compact('posts'));
    }

    public function showPostByTag($tag)
    {
        $tag = Tag::find($tag);
        $posts = $tag->posts()->paginate(10);
        return view('posts/index', compact('posts'));
    }

    public function showPostByAuthorAndByCategoryByTag($author, $category, $tag)
    {
        $posts = Post::where('user_id', $author)
            ->where('category_id', $category)
            ->whereHas('tags',function (Builder $query ) use ($tag){
                $query->where('tags.id',$tag);
            })
            ->paginate(10);
        return view('posts/index', compact('posts'));
    }
}
