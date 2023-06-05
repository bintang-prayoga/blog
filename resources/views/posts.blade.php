@extends('layouts.main')

@section('container')
    <h1 class="text-center">{{ $header }}</h1>

    <div class="row justify-content-center my-4">
        <div class="col-md-6">
            <form action="/posts">

                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}" />
                @elseif(request('user'))
                    <input type="hidden" name="user" value="{{ request('user') }}" />
                @endif
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
            @if ($posts[0]->image)
                <div style="max-height: 400px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $posts[0]->image) }}" class="card-img-top img-fluid"
                        alt="{{ $posts[0]->category->name }}">
                </div>
            @else
                <img src="https://source.unsplash.com/1200x400/?{{ $posts[0]->category->name }}" class="card-img-top"
                    alt="{{ $posts[0]->category->name }}">
            @endif
            <div class="card-body text-center">
                <h3 class="card-title">{{ $posts[0]->title }}</h3>
                <p class="card-text">
                    <small class="text-muted">
                        <h6 class="card-subtitle mb-2 text-muted">
                            By:
                            <a href="/posts?user={{ $posts[0]->user->username }}">
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
                            <a href="/posts?category={{ $post->category->slug }}">
                                <p class="position-absolute rounded-end text-white bg-dark px-3 py-2">
                                    {{ $post->category->name }}
                                </p>
                            </a>
                            @if ($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" class="card-image-top img-fluid"
                                    alt="{{ $post->image }}" width="600" height="600" />
                            @else
                                <img src="https://source.unsplash.com/600x600?{{ $post->category->name }}"
                                    class="card-img-top" alt="{{ $post->category->name }}" width="300" height="300">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <a href="/posts?user={{ $post->user->username }}">
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

    <div class="d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
@endsection
