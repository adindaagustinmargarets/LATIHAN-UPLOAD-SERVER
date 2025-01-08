<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand" href="/">Laravel</a>

        <!-- Toggler (for mobile view) -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Content -->
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <!-- Menu (Center Aligned) -->
            <ul class="navbar-nav mx-auto">
                @auth
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('features') ? 'active' : '' }}" href="/home">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('features') ? 'active' : '' }}" href="/features">Buat Freelance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('features') ? 'active' : '' }}" href="/features">Freelance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('pricing') ? 'active' : '' }}" href="/pricing">Riwayat</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('features') ? 'active' : '' }}" href="/">Info Freelance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('pricing') ? 'active' : '' }}" href="/">Artikel</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('contact') ? 'active' : '' }}" href="/">Kontak Kami</a>
                </li>
                @endauth
            </ul>

            <!-- Buttons (Right Aligned) -->
            <div class="d-flex align-items-center">
                @auth
                <!-- Jika pengguna sudah login -->
                <div class="dropdown">
                    <button class="btn btn-outline-light dropdown-toggle" type="button" id="accountDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="accountDropdown">
                        <li><a class="dropdown-item" href="/profile">Profil</a></li>
                        <li>
                            <form action="/logout" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">Keluar</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @else
                <!-- Jika pengguna belum login -->
                <a href="/login" class="btn btn-outline-light me-2">Login</a>
                <a href="/register" class="btn btn-light">Register</a>
                @endauth
            </div>

        </div>
    </div>
</nav>