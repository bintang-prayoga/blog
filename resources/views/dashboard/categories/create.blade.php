@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create New Category</h1>
    </div>

    <form action="/dashboard/categories" method="POST">
        @csrf
        <div class="row">
            <div class="mb-3 col">
                <label for="name" class="form-label">Category Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                    value="{{ old('name') }}">

                @error('name')
                    <div class="invalid-feedback">
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    </div>
                @enderror
            </div>

            <div class="mb-3 col">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" readonly
                    value="{{ old('slug') }}">
            </div>

            <div class="text-center my-3">
                <a href="/dashboard/posts" class="btn btn-danger mx-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Create Category</button>
            </div>
    </form>

    <script>
        const name = document.querySelector('#name');
        const slug = document.querySelector('#slug');


        name.addEventListener('change', function() {
            fetch('/dashboard/categories/makeSlug?name=' + name.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection
