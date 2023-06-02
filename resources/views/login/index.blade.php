@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-5">
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <main class="form-signin w-100 m-auto">
                <form>
                    @csrf
                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            <img src="https://images.fineartamerica.com/images/artworkimages/medium/3/pepe-the-clown-jenna-joane-transparent.png"
                                alt="" width="72" height="57">
                        </div>
                        <h1 class="h3 mb-3 fw-semibold text-center">Please Login</h1>
                    </div>

                    <div class="form-floating">
                        <input type="email" name="email" class="form-control" id="name"
                            placeholder="name@example.com">
                        <label for="name">Email address</label>
                    </div>

                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        <label for="password">Password</label>
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
                </form>
                <div class="text-center my-3">
                    <small>
                        Dont have an account? <a href="/register">Register</a>
                    </small>
                </div>

            </main>
        </div>
    </div>
@endsection
