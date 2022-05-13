<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsletterController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use App\Models\Post;
use App\Models\User;
use League\CommonMark\Extension\FrontMatter\Data\SymfonyYamlFrontMatterParser;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Contracts\Session\Session;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Validation\ValidationException;
use App\Services\NewsLetter;
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
Route::get('test',function(){
    $msg="<img src='https://media.gettyimages.com/photos/india-captain-virat-kohli-during-the-post-match-presentations-after-picture-id1338718098?s=612x612' height='300' width='400'>";

    return $msg;
});

Route::get('/',[PostController::class,'index']);

Route::get('/post/{post:slug}',[PostController::class,'show'])->where('post','[A-Za-z0-9-]+');
Route::post('/post/{post:slug}/comment',[CommentController::class,'store']);
Route::get('/register',[UserController::class,'create'])->middleware('guest');

Route::post('/newsletter',NewsletterController::class);

Route::post('/register',[UserController::class,'store'])->middleware('guest');

Route::get('/login',[SessionController::class,'create'])->middleware('guest');
Route::post('/login',[SessionController::class,'store'])->middleware('guest');

Route::post('/logout',[SessionController::class,'destroy'])->middleware('auth');