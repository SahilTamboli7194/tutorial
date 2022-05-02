@extends('layout')
@section('page_title')
Posts
@endsection
    
@section('body')
<?php foreach($posts as $post): ?>
        <article>
           <a href="/post/<?= $post->slug;?>">
           <h1>
              <?= $post->title;?>
           </h1>          
        </a> 
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
        <?= $post->excerpt;?>
        </article>  
    <?php endforeach?>
    <br><br>
    <a href="/">Go Back</a>
@endsection