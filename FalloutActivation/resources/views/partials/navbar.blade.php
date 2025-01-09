<nav class="navbar navbar-expand-lg navbar-dark bg-white px-0 py-3 border-bottom border-danger border-2 fixed-top"
    style="height: 75px;">
    <div class="container-xl">
        <!-- Logo -->
        <a class="navbar-brand" href="dashboard">
            <img src="https://www.telkom.co.id/images/logo_horizontal.svg" class="h-8" alt="..."
                style="width: 80%; height: auto;">
        </a>
        <!-- Navbar toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <!-- Nav -->
            <div class="navbar-nav mx-lg-auto">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="41" fill="currentColor"
                    class="bi bi-house-door" viewBox="0 0 16 16">
                    <path
                        d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4z" />
                </svg>
                <a href="dashboard"
                    class="nav-item nav-link text-dark {{ Request::is('dashboard') ? 'active' : '' }}">DASHBOARD</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="41" fill="currentColor"
                    class="bi bi-file-bar-graph" viewBox="0 0 16 16" style="margin-left: 5px;">
                    <path
                        d="M4.5 12a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5zm3 0a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5zm3 0a.5.5 0 0 1-.5-.5v-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-.5.5z" />
                    <path
                        d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1" />
                </svg>
                <a href="statistik"
                    class="nav-item nav-link text-dark {{ Request::is('statistik') ? 'active' : '' }}">STATISTIK</a>
                @if(Auth::check() && Auth::user()->role == 'admin')
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="41" fill="currentColor"
                        class="bi bi-file-bar-graph" viewBox="0 0 16 16" style="margin-left: 5px;">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path
                            d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1v-1c0-1-1-4-6-4s-6 3-6 4v1a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z" />
                    </svg>
                    <a href="kelola" class="nav-item nav-link text-dark {{ Request::is('kelola') ? 'active' : '' }}">KELOLA
                        USER</a>
                @endif
                <!-- <a class="nav-item nav-link text-dark" href="#">Features</a>
                <a class="nav-item nav-link text-dark" href="#">Pricing</a> -->
            </div>
            <!-- Right navigation -->
            @auth
                <div class="dropdown" >
                    <a href="login" class="btn btn-danger py-2 px-4 dropdown-toggle text-uppercase"
                        data-bs-toggle="dropdown">{{ Auth::user()->name }}</a>
                    <div class="dropdown-menu m-0">
                        <form action="/logout" method="post">
                            @csrf
                            <button class="dropdown-item" type="submit">
                                Log Out
                            </button>
                        </form>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>