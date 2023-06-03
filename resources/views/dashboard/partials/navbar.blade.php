<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="/">Trial Blog</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <form action="/logout" method="POST">
                @csrf
                <a class="nav-link px-3" href="#">
                    <button type="submit" style="all: unset">
                        <span data-feather="log-out" class="align-text-bottom"></span>
                        Logout
                    </button>
                </a>
            </form>
        </div>
    </div>
</header>
