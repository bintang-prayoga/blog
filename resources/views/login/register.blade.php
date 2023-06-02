@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <main class="form-signin w-100 m-auto">
                <form action="/register" method="POST">
                    @csrf
                    <div class="row justify-content-center">
                        <div class="text-center">
                            <img src="https://images.fineartamerica.com/images/artworkimages/medium/3/pepe-the-clown-jenna-joane-transparent.png"
                                alt="" width="72" height="57">
                        </div>
                        <h1 class="h3 mb-3 fw-semibold text-center">Please Register</h1>
                    </div>

                    <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            id="email" placeholder="name@example.com" required value={{ old('email') }}>
                        <label for="email">Email address</label>

                        @error('email')
                            <div class="invalid-tooltip">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            id="name" placeholder="John Doe" required value={{ old('name') }}>
                        <label for="name">Name</label>

                        @error('name')
                            <div class="invalid-tooltip">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                    <div class="form-floating">
                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                            id="username" placeholder="example-user" required value={{ old('username') }}>
                        <label for="username">Username</label>

                        @error('username')
                            <div class="invalid-tooltip">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" placeholder="Password" required>
                        <label for="password">Password</label>

                        @error('password')
                            <div class="invalid-tooltip">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                </form>
                <div class="text-center my-3">
                    <small>
                        Already have an account? <a href="/login">Login</a>
                    </small>
                </div>

            </main>
        </div>
    </div>
@endsection
