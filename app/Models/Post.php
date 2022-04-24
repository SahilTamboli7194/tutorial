<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;

class Post extends Model
{
    use HasFactory;

    public static function All_flies()
    {
        $files= File::files(resource_path("posts/"));

        return array_map(fn($file) => $file->getContents(),$files);
        //return $posts;
    }
    public static function find($slug)
    {
            $path=resource_path("posts/{$slug}.html");

            if(!file_exists($path))
            {
                throw new ModelNotFoundException();
               // return redirect('/');
            }
           //$post=file_get_contents($path);
           return cache()->remember("post.{$slug}", 5,fn()=>file_get_contents($path));

    }
}
