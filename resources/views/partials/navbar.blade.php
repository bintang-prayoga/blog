<nav class="navbar navbar-dark navbar-expand-lg bg-secondary">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">

                {{-- Not Working |  Figure Out --}}
                {{-- <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Home</a>
                <a class="nav-link {{ Request::is('/about') ? 'active' : '' }}" href="/about">About</a>
                <a class="nav-link {{ Request::is('/posts') ? 'active' : '' }}" href="/posts">Blog</a> --}}

                {{-- Classic Ternary | WPU Way --}}
                <a class="nav-link {{ $title === 'Trial Blog | Home' ? 'active' : '' }}" aria-current="page"
                    href="/">Home</a>
                <a class="nav-link {{ $title === 'Trial Blog | About' ? 'active' : '' }}" aria-current="page"
                    href="/about">About</a>
                <a class="nav-link {{ $title === 'Trial Blog | Posts' ? 'active' : '' }}" aria-current="page"
                    href="/posts">Posts</a>

            </div>
        </div>
    </div>
</nav>
