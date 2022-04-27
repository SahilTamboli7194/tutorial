<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Cache;
use League\CommonMark\Extension\FrontMatter\Data\SymfonyYamlFrontMatterParser;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post extends Model
{
    use HasFactory;

    public $title;
    public $excerpt;
    public $date;
    public $slug;
    public  $body;

    public function __construct($title,$excerpt,$date,$slug,$body )
    {
       $this->title = $title;  
       $this->excerpt = $excerpt;  
       $this->date = $date;  
       $this->slug = $slug;  
       $this->body = $body;  
    }
    public static function All_flies()
    {
       return cache()->rememberForever('posts.All_files', function(){

            return collect(File::files(resource_path("posts/")))
            ->map(fn($file)=>YamlFrontMatter::parseFile($file))
            ->map(fn($documnet)=>new Post(
                $documnet->title,
                $documnet->excerpt,
                $documnet->date,
                $documnet->slug,
                $documnet->body()
            ))->sortByDesc('date');

        });
       
    }
    public static function find($slug)
    {    
        
        return static::All_flies()->firstWhere('slug',$slug);;

    }
}
