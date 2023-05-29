@extends('layouts.main')

@section('container')
    <h1>Posts</h1>

    <div class="row">
        @foreach ($posts as $post)
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="{{ $post->image }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <a href="/authors/{{ $post->user->username }}">
                            <h6 class="card-subtitle mb-2 text-muted">{{ $post->user->name }}</h6>
                        </a>
                        <p class="card-text">{{ $post->excerpt }}</p>
                        <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
