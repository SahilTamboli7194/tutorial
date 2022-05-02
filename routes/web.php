<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use App\Models\Post;
use App\Models\User;
use League\CommonMark\Extension\FrontMatter\Data\SymfonyYamlFrontMatterParser;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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
    // \Illuminate\Support\Facades\DB::listen(function ($query){
    //     logger($query->sql,$query->bindings);
    // });
    return view('posts',
    [
        //'posts' => Post::all()
        'posts' => Post::latest()->with('category')->get()
    ]);
});

Route::get('/post/{post:slug}', function (Post $post) {
  
    //$post = Post::findorFail($id);
    
    return view('post',['post' => $post]);

})->where('post','[A-Za-z0-9-]+');

Route::get('category/{category:slug}', function (Category $category){
    //ddd($category);
    return view('posts',
    [
        'posts' => $category->posts
    ]);
});

Route::get('author/{author:username}', function (User $author){
    //dd($author);
    return view('posts',
    [
        'posts' => $author->posts
    ]);
});