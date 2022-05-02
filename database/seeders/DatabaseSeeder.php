<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Post::truncate();
        Category::truncate();
    //    $user = User::factory()->create();
    //     $personal=Category::create([
    //         'name'=>'Personal',
    //         'slug'=>'personal'
    //     ]);

    //     $family=Category::create([
    //         'name'=>'Family',
    //         'slug'=>'family'
    //     ]);

    //     $work=Category::create([
    //         'name'=>'Work',
    //         'slug'=>'work'
    //     ]);

    //     Post::create([
    //         'user_id'=>$user->id,
    //         'category_id'=>$personal->id,
    //         'title'=>'My Persoanl Post',
    //         'slug'=>'my-personal-post',
    //         'excerpt'=>'<p>this is Persoan post</p>',
    //         'body'=>'<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. 
    //         Nobis itaque explicabo quo, rerum animi ad, optio perferendis, 
    //         nisi sint dignissimos temporibus autem iure pariatur molestiae 
    //         aperiam illum quibusdam molestias adipisci</p>.'
    //     ]);

    //     Post::create([
    //         'user_id'=>$user->id,
    //         'category_id'=>$family->id,
    //         'title'=>'My Family Post',
    //         'slug'=>'my-family-post',
    //         'excerpt'=>'<p>this is Family post</p>',
    //         'body'=>'<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. 
    //         Nobis itaque explicabo quo, rerum animi ad, optio perferendis, 
    //         nisi sint dignissimos temporibus autem iure pariatur molestiae 
    //         aperiam illum quibusdam molestias adipisci</p>.'
    //     ]);

    //     Post::create([
    //         'user_id'=>$user->id,
    //         'category_id'=>$work->id,
    //         'title'=>'My Work Post',
    //         'slug'=>'my-work-post',
    //         'excerpt'=>'<p>this is Work post</p>',
    //         'body'=>'<p> Lorem ipsum dolor sit amet consectetur adipisicing elit. 
    //         Nobis itaque explicabo quo, rerum animi ad, optio perferendis, 
    //         nisi sint dignissimos temporibus autem iure pariatur molestiae 
    //         aperiam illum quibusdam molestias adipisci</p>.'
    //      ]);
    //    Category::factory(10)->create();
        Post::factory(10)->create();
    }
}
