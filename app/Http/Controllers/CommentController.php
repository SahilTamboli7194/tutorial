<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class CommentController extends Controller
{
    public function store(Post $post){

        request()->validate([
            'body' => 'required|min:3'
        ]);

        $post->comment()->create([
            'post_id' => $post->id,
            'user_id' => auth()->user()->id,
            'body'=> request('body')
        ]);
        //return request('body')." user id".auth()->user()->id." Post id".$post->id;

        return back();
    }
}
