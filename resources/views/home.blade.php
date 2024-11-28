@extends('layouts.main')

@section('title', 'Beranda')

@section('content')
<div class="container-fluid px-0">
    <!-- Welcome Section with Auto-Sliding Carousel -->
    <div class="row gx-0">
        <div class="col-12">
            <div id="welcomeCarousel" class="carousel slide position-relative" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <img src="/assets/images/lapangan/lapangan.jpg" alt="Slide 1" class="d-block w-100 vh-75 object-fit-cover">
                    </div>
                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <img src="/assets/images/lapangan/guru.jpeg" alt="Slide 2" class="d-block w-100 vh-75 object-fit-cover">
                    </div>
                    <!-- Slide 3 -->
                    <div class="carousel-item">
                        <img src="/assets/images/lapangan/selamat.jpg" alt="Slide 3" class="d-block w-100 vh-75 object-fit-cover">
                    </div>
                </div>

                <!-- Welcome Overlay -->
                <div class="welcome-overlay position-absolute top-50 start-0 translate-middle-y text-white p-5">
                    <h1 class="h2 fw-bold">SMKN 4 KOTA BOGOR</h1>
                    <p class="mt-3 fw-bold" style="color: #007bff;">KR4BAT (Kejuruan Empat Hebat). AKHLAK terpuji ILMU terkaji TERAMPIL dan Teruji.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Sambutan Kepala Sekolah -->
<div class="row justify-content-center my-5 py-5 bg-light shadow-sm rounded">
    <div class="col-md-10 d-flex flex-wrap align-items-stretch">
        <!-- Foto Kepala Sekolah -->
        <div class="col-md-4 d-flex justify-content-center align-items-center mb-4 mb-md-0">
            <div class="position-relative shadow rounded-circle overflow-hidden" style="width: 200px; height: 200px;">
                <img src="/assets/images/kepala.jpg" alt="Kepala Sekolah" class="img-fluid w-100 h-100 object-fit-cover">
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: linear-gradient(180deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.3));"></div>
            </div>
        </div>
        <!-- Sambutan Teks -->
        <div class="col-md-8 d-flex flex-column justify-content-center">
            <h2 class="fw-bold text-primary mb-3 text-center text-md-start" style="font-family: 'Poppins', sans-serif;">Sambutan Kepala Sekolah</h2>
            <p class="text-muted text-center text-md-start mb-1" style="font-size: 1.2rem;"><strong>Drs. Mulya Murprihartono, M.Si.</strong></p>
            <p class="text-center text-md-start mb-3"><em>Kepala Sekolah Ke-3, Juli 2020 - sekarang</em></p>
            <p class="text-justify text-muted mb-3" style="line-height: 1.8; font-size: 1rem;">
                Sejak satu tahun lalu SMKN 4 Kota Bogor dipimpin oleh seseorang yang membawa warna baru. Tahun pertama sejak dilantik, tepatnya pada tanggal 10 Juli 2020, inovasi dan kebijakan-kebijakan baru pun mulai dirancang. Bukan tanpa kesulitan, penuh tantangan, tetapi beliau meyakinkan untuk selalu optimis pada harapan dengan bersinergi mewujudkan visi misi SMKN 4 Bogor di tengah kesulitan pandemi ini.
            </p>
            <p class="text-justify text-muted mb-4" style="line-height: 1.8; font-size: 1rem;">
                Strategi baru pun dimunculkan, beberapa program sudah terealisasikan di antaranya pengembangan aplikasi LMS (Learning Management System) sebagai solusi dalam pelaksanaan program BDR (Belajar dari Rumah), untuk mengoptimalkan hubungan kerja sama antara sekolah dengan Industri dan Dunia Kerja (IDUKA), serta untuk pengalaman praktik belajar jarak jauh agar tetap berjalan dengan optimal.
            </p>
            <div class="text-center text-md-start">
                <a href="/profilPage" class="btn btn-primary btn-lg shadow-lg rounded-pill" style="font-family: 'Poppins', sans-serif;">Selengkapnya</a>
            </div>
        </div>
    </div>
</div>

<style>
    .object-fit-cover {
        object-fit: cover;
    }

    .rounded-circle {
        border: 5px solid #f0f9ff;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        color: #fff;
    }

    .shadow-lg {
        box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
    }
</style>


  <!-- Section Ikon Galeri, Informasi, dan Agenda -->
<div class="row justify-content-center py-5 bg-white shadow-sm">
    <div class="col-md-8 text-center">
        <h2 class="fw-bold text-primary mb-4" style="font-family: 'Poppins', sans-serif;">Fitur Kami</h2>
        <div class="d-flex justify-content-around flex-wrap">
            <!-- Galeri -->
            <a href="/galeriPage" class="text-decoration-none text-dark">
                <div class="d-flex flex-column align-items-center">
                    <div class="icon-container mb-3 d-flex justify-content-center align-items-center rounded-circle shadow-sm"
                         style="width: 80px; height: 80px; background-color: #f0f9ff; transition: all 0.3s ease-in-out;">
                        <i data-feather="image" class="text-primary" style="width: 40px; height: 40px;"></i>
                    </div>
                    <p class="fw-bold mt-2" style="font-family: 'Poppins', sans-serif;">Galeri</p>
                </div>
            </a>

            <!-- Informasi -->
            <a href="/informasi" class="text-decoration-none text-dark">
                <div class="d-flex flex-column align-items-center">
                    <div class="icon-container mb-3 d-flex justify-content-center align-items-center rounded-circle shadow-sm"
                         style="width: 80px; height: 80px; background-color: #f0f9ff; transition: all 0.3s ease-in-out;">
                        <i data-feather="info" class="text-primary" style="width: 40px; height: 40px;"></i>
                    </div>
                    <p class="fw-bold mt-2" style="font-family: 'Poppins', sans-serif;">Informasi</p>
                </div>
            </a>

            <!-- Agenda -->
            <a href="/agenda" class="text-decoration-none text-dark">
                <div class="d-flex flex-column align-items-center">
                    <div class="icon-container mb-3 d-flex justify-content-center align-items-center rounded-circle shadow-sm"
                         style="width: 80px; height: 80px; background-color: #f0f9ff; transition: all 0.3s ease-in-out;">
                        <i data-feather="calendar" class="text-primary" style="width: 40px; height: 40px;"></i>
                    </div>
                    <p class="fw-bold mt-2" style="font-family: 'Poppins', sans-serif;">Agenda</p>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Feather Icons Script -->
<script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
<script>
    feather.replace(); // Inisialisasi Feather Icons
</script>

<style>
    /* Hover Effects */
    .icon-container {
        transition: all 0.3s ease-in-out; /* Smooth transition for hover effect */
    }

    .icon-container:hover {
        transform: scale(1.3); /* Perbesar ikon saat hover */
        background-color: #e0f7fa; /* Warna latar lebih cerah */
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.2); /* Shadow lebih besar dan lembut */
        cursor: pointer; /* Ubah kursor saat hover */
    }

    .icon-container i {
        transition: color 0.3s ease; /* Smooth color transition */
    }

    .icon-container:hover i {
        color: #007bff; /* Ubah warna ikon saat hover */
    }

    /* Styling text */
    p {
        font-size: 1rem;
        color: #333;
    }

    .text-primary {
        color: #007bff !important;
    }
</style>




    <section id="map-section" class="py-5" style="background-color: white;">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ratio ratio-16x9 shadow border border-2 rounded" style="overflow: hidden;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31723.22360435326!2d106.822119!3d-6.6407334!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69c8b16ee07ef5%3A0x14ab253dd267de49!2sSMK%20Negeri%204%20Bogor!5e0!3m2!1sen!2sid!4v1698236789473!5m2!1sen!2sid"
                            width="100%"
                            height="100%"
                            style="border:0;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>
                <div class="col-lg-6 text-white d-flex flex-column justify-content-center">
                    <h2 class="text-warning mb-4">SMK Negeri 4 Kota Bogor</h2>
                    <p>Jl. Raya Tajur, Kp. Buntar RT.02/RW.08, Kel. Muara sari, Kec. Bogor Selatan, RT.03/RW.08, Muarasari, Kec. Bogor Sel., Kota Bogor, Jawa Barat 16137</p>
                    <p><strong>Telepon:</strong> (0251) 7547381</p>
                    <p><strong>Email:</strong> smkn4@smkn4bogor.sch.id</p>
                    <p><strong>Instagram:</strong> smkn4kotabogor</p>
                </div>
            </div>
        </div>
    </section>


    <!-- Inline CSS -->
    <style>
        .vh-75 {
            height: 75vh;
        }

        .object-fit-cover {
            object-fit: cover;
        }

        .welcome-overlay h1 {
            font-size: 1.75rem;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }

        .welcome-overlay p {
            font-size: 0.9rem;
            line-height: 1.6;
        }

        .d-flex.align-items-stretch {
            height: 100%;
            /* Pastikan tinggi container fleksibel */
        }

        .rounded {
            border-radius: 8px;
            /* Foto tetap kotak dengan sedikit sudut membulat */
        }

        .shadow-lg {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1), 0 2px 4px rgba(0, 0, 0, 0.06);
            /* Memberikan bayangan */
        }

        .text-justify {
            text-align: justify;
            /* Membuat teks rata kiri-kanan */
        }

        .icon-container i {
            transition: transform 0.3s, color 0.3s;
        }

        .icon-container i:hover {
            transform: scale(1.2);
            color: #007bff;
            /* Warna hover */
        }
    </style>
    @endsection