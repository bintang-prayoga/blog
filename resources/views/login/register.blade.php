@extends('layouts.main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <main class="form-signin w-100 m-auto">
                <form>
                    <div class="row justify-content-center">
                        <div class="text-center">
                            <img src="https://images.fineartamerica.com/images/artworkimages/medium/3/pepe-the-clown-jenna-joane-transparent.png"
                                alt="" width="72" height="57">
                        </div>
                        <h1 class="h3 mb-3 fw-semibold text-center">Please Register</h1>
                    </div>

                    <div class="form-floating">
                        <input type="email" name="email" class="form-control" id="email"
                            placeholder="name@example.com">
                        <label for="email">Email address</label>
                    </div>

                    <div class="form-floating">
                        <input type="text" name="name" class="form-control" id="name" placeholder="John Doe">
                        <label for="name">Name</label>
                    </div>


                    <div class="form-floating">
                        <input type="text" name="username" class="form-control" id="username"
                            placeholder="example-user">
                        <label for="username">Username</label>
                    </div>

                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                        <label for="password">Password</label>
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
