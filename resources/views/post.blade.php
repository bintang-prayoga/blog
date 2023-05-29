@extends('layouts.main')

@section('container')
    <article>
        <h1>{{ $post->title }} - {{ $post->artist }}</h1>
        <a href="/authors/{{ $post->user->username }}">
            <h5>Author: {{ $post->user->name }}</h5>
        </a>
        <a href="/categories/{{ $post->category->slug }}">
            <h6>Genre: {{ $post->category->name }}</h6>
        </a>
        <img src="{{ $post->image }}" alt="{{ $post->title }}" class="img-fluid" width="250" height="250">
        {!! $post->body !!}
        <a href="/posts">Back to Posts</a>
    </article>
@endsection
