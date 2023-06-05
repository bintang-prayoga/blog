@extends('dashboard.layouts.main')

@section('container')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit {{ $post->title }}</h1>
    </div>

    <form action="/dashboard/posts/{{ $post->slug }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('put')

        <div class="row">
            <div class="mb-3 col">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title', $post->title) }}">

                @error('title')
                    <div class="invalid-feedback">
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    </div>
                @enderror
            </div>

            <div class="mb-3 col">
                <label for="artist" class="form-label">Artist</label>
                <input type="text" class="form-control @error('artist') is-invalid @enderror" id="artist"
                    name="artist" value="{{ old('artist', $post->artist) }}">

                @error('artist')
                    <div class="invalid-feedback">
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    </div>
                @enderror
            </div>
        </div>

        <div class="row">
            <div class="mb-3 col">
                <label for="slug" class="form-label">Slug</label>
                <input type="text" class="form-control" id="slug" name="slug" readonly
                    value="{{ old('slug', $post->slug) }}">
            </div>

            <div class="col">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-select @error('category_id') is-invalid @enderror" aria-label="Default select example"
                    name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        {{-- Commenter solution | Not Working | Figure Out --}}
                        {{-- <option value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? ' selected' : ' ' }}" selected>
                            {{ $category->name }}</option> --}}

                        @if (old('category_id', $post->category_id) == $category->id)
                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>

                @error('category_id')
                    <div class="invalid-feedback">
                        <p class="text-danger">
                            {{ $message }}
                        </p>
                    </div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label @error('image') is-invalid @enderror">Header Image
                <span class="text-danger">
                    @error('image')
                        {{ $message }}
                    @enderror
                </span>
            </label>
            @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" class="image-preview image-fluid col-sm-5 text-center" />
            @else
                <img class="image-preview image-fluid col-sm-5 text-center" />
            @endif
            <input class="form-control" type="file" id="image" name="image" accept=".jpg, .png"
                onchange="previewImage()">
        </div>

        <div class="mb-3">
            <div class="row d-flex">
                <label for="body" class="form-label col @error('body') is-invalid @enderror">Body
                    <span class="text-danger">
                        @error('body')
                            {{ $message }}
                        @enderror
                    </span>
                </label>

            </div>
            <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
            <trix-editor input="body"></trix-editor>
        </div>

        <div class="text-center my-3">
            <a href="/dashboard/posts" class="btn btn-danger mx-2">Cancel</a>
            <button type="submit" class="btn btn-primary mx-2">Update Post</button>
        </div>
    </form>

    <script>
        const title = document.querySelector('#title');
        const slug = document.querySelector('#slug');

        title.addEventListener('change', function() {
            fetch('/dashboard/posts/makeSlug?title=' + title.value)
                .then(response => response.json())
                .then(data => slug.value = data.slug)
        });
    </script>
@endsection
