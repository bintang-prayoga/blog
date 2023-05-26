@extends('layouts.main')

@section('container')
    <h1>Categories</h1>

    <div class="row">
        @foreach ($categories as $category)
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category->name }}</h5>

                        <a href="/categories/{{ $category->slug }}" class="btn btn-primary">Go</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
