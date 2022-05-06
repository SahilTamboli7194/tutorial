<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use App\Models\Post;
use App\Models\User;
use League\CommonMark\Extension\FrontMatter\Data\SymfonyYamlFrontMatterParser;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\PostController;

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
//tetsing

// Route::get('/',function(){
//     return view('posts.index');
// });

Route::get('/',[PostController::class,'index']);

Route::get('/post/{post:slug}',[PostController::class,'show'])->where('post','[A-Za-z0-9-]+');
