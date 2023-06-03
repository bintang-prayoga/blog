@extends('dashboard.layouts.main')

@section('container')
    @if (session()->has('success'))
        <div class="alert alert-success my-3" role="alert">
            {{ session('success') }}

        </div>
    @elseif(session()->has('error'))
        <div class="alert alert-danger my-2" role="alert">
            {{ session('error') }}
        </div>
    @endif

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">My Posts</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="/dashboard/posts/create">
                <button type="button" class="btn btn-sm btn-outline-info">
                    Add Post
                    <span data-feather="plus-circle" class="align-text-bottom"></span>
                </button>
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col" class="text-center">Action</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category->name }}</td>
                        <td class="text-center">
                            <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info">
                                <span data-feather="eye" class="align-text-bottom"></span>
                            </a>
                            <a href="" class="badge bg-warning">
                                <span data-feather="edit-3" class="align-text-bottom"></span>
                            </a>
                            <a href="" class="badge bg-danger">
                                <span data-feather="trash-2" class="align-text-bottom"></span>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
