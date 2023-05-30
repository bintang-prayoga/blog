@extends('layouts.main')

@section('container')
    <h1 class="text-center">{{ $header }}</h1>

    <div class="row justify-content-center my-4">
        <div class="col-md-6">
            <form action="/posts">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="search"
                        value="{{ request('search') }}">
                    <input type="submit" class="btn btn-outline-primary" id="button-addon2" />
                </div>
            </form>
        </div>
    </div>

    @if ($posts->count())
        <div class="card mb-3">
            <img src="https://source.unsplash.com/1200x400/?{{ $posts[0]->category->name }}" class="card-img-top"
                alt="{{ $posts[0]->category->name }}">
            <div class="card-body text-center">
                <h3 class="card-title">{{ $posts[0]->title }}</h3>
                <p class="card-text">
                    <small class="text-muted">
                        <h6 class="card-subtitle mb-2 text-muted">
                            By:
                            <a href="/authors/{{ $posts[0]->user->username }}">
                                {{ $posts[0]->user->name }}
                            </a>
                            {{ $posts[0]->created_at->diffForHumans() }}
                        </h6>
                    </small>
                </p>
                <p class="card-text">{{ $posts[0]->excerpt }}.</p>

                <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-primary">Read More</a>

            </div>
        </div>

        <div class="container">
            <div class="row">
                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 my-3">
                        <div class="card" style="width: 18rem;">
                            <a href="/categories/{{ $post->category->slug }}">
                                <p class="position-absolute rounded-end text-white bg-dark px-3 py-2">
                                    {{ $post->category->name }}
                                </p>
                            </a>
                            <img src="https://source.unsplash.com/600x600?{{ $post->category->name }}" class="card-img-top"
                                alt="{{ $post->category->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <a href="/authors/{{ $post->user->username }}">
                                    <h6 class="card-subtitle mb-2 text-muted">{{ $post->user->name }}</h6>
                                </a>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a href="/posts/{{ $post->slug }}" class="btn btn-primary">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p class="text-center fs-4">No post found.</p>
    @endif
@endsection
