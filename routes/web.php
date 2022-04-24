<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use App\Models\Post;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $posts=Post::All_flies();
    //dd($posts);
    return view('posts',
    [
        'posts' => $posts
    ]);
});

Route::get('/post/{post}', function ($slug) {

    return view('post',[
    'post'=>Post::find($slug)
]);

})->where('post','[A-Za-z0-9-]+');