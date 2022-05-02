
@extends('layout')

@section('page_title')
Post
@endsection
    
@section('body')
<h1>    
{!! $post->title !!}
</h1>
        <p>
            By 
            <a href="/author/{{$post->user->username}}">
                {{$post->user->name}}
            </a>
            
            in 
            
            <a href="/category/{{$post->category->slug}}">
                <?= $post->category->name;?>
            </a>
        </p>

{!! $post->body !!}
<br>
<a href="/">
    Go Back
</a>
@endsection
