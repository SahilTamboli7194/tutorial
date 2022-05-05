<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()
    {

       return view('posts',
       [
           'posts' => Post::latest()->filter(request(['search']))->with('category','user')->get(),
           'categories'=>Category::all()
       ]);
    }

    public function show(Post $post)
    {
        return view('post',['post' => $post]);
    }

}
