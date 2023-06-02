<nav class="navbar navbar-dark navbar-expand-lg bg-secondary">
    <div class="container">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Trial Blog | Home' ? 'active' : '' }}" aria-current="page"
                        href="/">Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Trial Blog | About' ? 'active' : '' }}" aria-current="page"
                        href="/about">About
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Trial Blog | Posts' ? 'active' : '' }}" aria-current="page"
                        href="/posts">Posts
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $title === 'Trial Blog | Categories' ? 'active' : '' }}" aria-current="page"
                        href="/categories">Categories
                    </a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="/dashboard">
                                    <i class="bi bi-card-text mx-2"></i>Dashboard
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <form action="/logout" method="POST">
                                @csrf
                                <li>
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-left mx-2"></i>Logout
                                    </button>
                                </li>
                            </form>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/login">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
