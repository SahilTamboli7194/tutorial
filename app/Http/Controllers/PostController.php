<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    public function index()

    {
       // return Post::latest()->filter(request(['search','category','author']))->with('category','user')->paginate(3);
        // dd(request(['search','category']));
       return view('posts.index',
       [    
           'posts' => Post::latest()->filter(request(['search','category','author']))->with('category','user')->simplePaginate(6)->withQueryString(),
           'categories'=>Category::all()           
       ]);
    }

    public function show(Post $post)
    {
        return view('posts.show',['post' => $post]);
    }

   
}
