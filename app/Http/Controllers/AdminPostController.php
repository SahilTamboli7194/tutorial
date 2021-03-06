<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Category;
use Illuminate\Support\Facades\Gate;

class AdminPostController extends Controller
{
    public function index()
    {
        
        return view('admin.posts.index',[
            'posts'=>Post::paginate(50)
        ]);
    }

    public function create(){
    
        return view('admin.posts.create');
    }
   
    public function store()
    {
 
        Post::create(array_merge($this->validatePost(),[
            'user_id'=>auth()->user()->id,
            'thumbnail'=>request()->file('thumbnail')->store('thumbnails')
        ]));

        return back()->with('success','your post has sucessfully posted');
    }

    public function edit(Post $post)
    {
     
        return view('admin.posts.edit',[
            'post'=>$post
        ]);
    }

    public function update(Post $post)
    {
    
        $attributes = $this->validatePost($post);

        if($attributes['thumbnail'] ?? false)
        {
            $attributes['thumbnail']=request()->file('thumbnail')->store('thumbnails');
        }
       
        $post->update($attributes);

        return back()->with('success','your post has sucessfully edited');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success','Post Deleted');
    }

    protected function validatePost(?Post $post=null):array{

        $post ??=new Post();
        $attributes = request()->validate([
            'title'=>'required',
            'thumbnail'=>$post->exists ? ['image']:['required','image'],
            'slug'=>['required',Rule::unique('posts','slug')->ignore($post->id)],
            'excerpt'=>'required',
            'body'=>'required',
            'category_id'=>['required',Rule::exists('categories','id')]
        ]);

        return $attributes;
    }
}
