<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item"> 
                    <a class="sidebar-link sidebar-link" href="/admin" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu">Applications</span></li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/petugas" aria-expanded="false">
                        <i data-feather="users" class="feather-icon"></i><span class="hide-menu">Manajemen Admin</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/categories" aria-expanded="false">
                        <i data-feather="layers" class="feather-icon"></i><span class="hide-menu">Kategori Post</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/posts" aria-expanded="false">
                        <i data-feather="list" class="feather-icon"></i><span class="hide-menu">Post</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/galleries" aria-expanded="false">
                        <i data-feather="image" class="feather-icon"></i><span class="hide-menu">Galeri</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/profile" aria-expanded="false">
                        <i data-feather="layout" class="feather-icon"></i><span class="hide-menu">Halaman Page</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation-->
    </div>
    <!-- End Sidebar scroll-->
</aside>

<style>
    /* Styling Sidebar */
.left-sidebar {
    background: linear-gradient(135deg, #f3f4f6, #ffffff); /* Gradasi abu-abu sangat terang ke putih */
    color: #333333; /* Warna teks default */
    height: 100vh; /* Sidebar penuh sepanjang layar */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Tambahkan bayangan untuk efek dimensi */
    border-right: 1px solid #e5e7eb; /* Garis pembatas */
}

.left-sidebar .sidebar-item a {
    color: #555555; /* Warna teks abu-abu */
    font-weight: 500; /* Berat teks medium */
    border-radius: 8px; /* Sudut melengkung */
    padding: 10px 15px; /* Jarak dalam */
    transition: background-color 0.3s, color 0.3s, box-shadow 0.3s; /* Animasi halus */
}

.left-sidebar .sidebar-item a:hover {
    background-color: #e2e8f0; /* Warna hover abu-abu terang */
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1); /* Efek bayangan hover */
    color: #3498db; /* Teks berubah menjadi biru */
}

.left-sidebar .feather-icon {
    color: #555555; /* Warna ikon abu-abu gelap */
    transition: color 0.3s; /* Animasi perubahan warna ikon */
}

.left-sidebar .sidebar-item a:hover .feather-icon {
    color: #3498db; /* Ikon berubah menjadi biru saat hover */
}

.left-sidebar .nav-small-cap span {
    color: #888888; /* Warna teks kecil abu-abu */
    font-size: 12px; /* Ukuran teks kecil */
    text-transform: uppercase; /* Huruf besar */
    margin-top: 10px; /* Jarak atas */
    display: block;
}

.list-divider {
    border-top: 1px solid #d1d5db; /* Divider dengan warna abu-abu terang */
}

</style>

<script>
    // Feather Icon Initialization
    document.addEventListener("DOMContentLoaded", function () {
        feather.replace();
    });
</script>

<!-- Feather Icons -->
<script src="https://unpkg.com/feather-icons"></script>
