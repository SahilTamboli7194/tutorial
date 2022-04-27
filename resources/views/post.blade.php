
@extends('layout')

@section('page_title')
{{ $post->title }}
@endsection
    
@section('body')
<h1>
    {{ $post->title }}
</h1>
{!! $post->body !!}
<a href="/">
    Go Back
</a>
@endsection
