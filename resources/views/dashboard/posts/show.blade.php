@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <h2>{{ $post->title }} - {{ $post->artist }}</h2>

                <div class="my-3">
                    <a class="btn btn-info" href="/dashboard/posts">
                        <span data-feather="arrow-left" class="align-text-bottom"></span>
                        Back To Dashboard
                    </a>
                    <a class="btn btn-warning" href="/dashboard/posts/{{ $post->slug }}/edit">
                        <span data-feather="edit" class="align-text-bottom"></span>
                        Edit
                    </a>
                    <form action="/dashboard/posts" method="POST" style="all:unset">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-danger" onclick="return confirm('are you sure?')">
                            <span data-feather="trash" class="align-text-bottom"></span>
                            Delete
                        </button>
                    </form>
                </div>
                <img src="https://source.unsplash.com/800x250/?{{ $post->category->name }}" alt="{{ $post->title }}"
                    class="img-fluid" width="800" height="250">
                <article class="my-3 fw-semibold">
                    {!! $post->body !!}
                </article>

            </div>
        </div>
    </div>
@endsection
