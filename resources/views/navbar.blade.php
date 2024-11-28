<!-- resources/views/navbar.blade.php -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-lg sticky-top">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="/assets/images/logo/logo04.jpg" alt="Logo SMKN 4 Bogor" width="50" height="50" class="me-3 rounded-circle shadow-sm">
            <span class="fw-bold fs-4 text-uppercase">SMKN 4 BOGOR</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->routeIs('profilPage') ? 'active' : '' }}" href="{{ route('profilPage') }}">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->is('galeriPage') ? 'active' : '' }}" href="{{ url('/galeriPage') }}">Galeri</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->is('agenda') ? 'active' : '' }}" href="{{ url('/agenda') }}">Agenda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link px-3 {{ request()->is('informasi') ? 'active' : '' }}" href="{{ url('/informasi') }}">Informasi</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Tambahkan Bootstrap JS jika belum ada -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- Tambahkan CSS untuk styling -->
<style>
    /* Styling Logo */
    .navbar-brand img {
        object-fit: cover;
        transition: transform 0.3s ease-in-out;
    }
    .navbar-brand img:hover {
        transform: scale(1.1);
    }

    /* Styling Navbar Links */
    .navbar-nav .nav-link {
        color: white;
        transition: color 0.3s ease-in-out, background-color 0.3s ease-in-out, transform 0.2s;
        text-transform: uppercase;
    }
    .navbar-nav .nav-link:hover {
        color: #ffc107; /* Warna hover */
        background-color: rgba(255, 255, 255, 0.2); /* Background hover */
        border-radius: 25px; /* Rounded edges */
        transform: scale(1.05);
    }

    /* Styling Link Aktif */
    .navbar-nav .nav-link.active {
        color: #ffffff;
        background-color: #0056b3; /* Lebih gelap untuk membedakan */
        border-radius: 25px;
        font-weight: bold;
    }

    /* Shadow untuk Navbar */
    .navbar {
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
    }

    /* Styling Navbar di Mobile */
    @media (max-width: 768px) {
        .navbar-brand span {
            font-size: 1.25rem;
        }
        .navbar-nav .nav-link {
            padding: 12px 16px;
        }
    }
</style>
