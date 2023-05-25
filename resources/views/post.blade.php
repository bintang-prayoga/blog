@extends('layouts.main')

@section('container')
    <article>
        <h1>{{ $post->title }}</h1>
        <h5>By: {{ $post->artist }}</h3>
            <img src="{{ $post->image }}" alt="{{ $post->title }}" class="img-fluid" width="250" height="250">
            {!! $post->body !!}
            <a href="/posts">Back to Posts</a>
    </article>
@endsection
