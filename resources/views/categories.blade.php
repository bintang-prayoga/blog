@extends('layouts.main')

@section('container')
    <h1 class="text-center">Categories</h1>

    <div class="row my-4">
        @foreach ($categories as $category)
            <div class="col-md-4">
                <div class="card text-center" style="width: 18rem;">
                    <img src="https://source.unsplash.com/600x600?{{ $category->name }}" class="card-img-top"
                        alt="{{ $category->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <a href="/posts?category={{ $category->slug }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
