@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h2>{{ $post->title }} - {{ $post->artist }}</h2>
                <p>
                    By:
                    <a class="text-decoration-none" href="/authors/{{ $post->user->username }}">
                        {{ $post->user->name }}
                    </a>
                    in
                    <a class="text-decoration-none" href="/categories/{{ $post->category->slug }}">
                        {{ $post->category->name }}
                    </a>
                </p>
                <img src="https://source.unsplash.com/800x250/?{{ $post->category->name }}" alt="{{ $post->title }}"
                    class="img-fluid" width="800" height="250">
                <article class="my-3 fw-semibold">
                    {!! $post->body !!}
                </article>
                <div class="text-center">
                    <a href="/posts" class="btn btn-primary">Back To Posts</a>
                </div>
            </div>
        </div>
    </div>
@endsection
