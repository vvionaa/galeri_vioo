@extends('layouts.main')

@section('title', 'Profil')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header Section -->
            <div class="text-center mb-5">
                <h1 class="display-3 fw-bold text-gradient">Profil Sekolah</h1>
                <p class="text-muted fs-5">Mengenal lebih dekat perjalanan, visi, dan dedikasi SMKN 4 Bogor dalam mencetak generasi unggul.</p>
                <div class="divider-gradient">
                    <span><i class="fas fa-star"></i></span>
                </div>
            </div>

            <!-- Profile Content -->
            @forelse($profiles as $profile)
            <div class="profile-card-modern shadow-lg mb-5">
                <div class="row g-0 align-items-center">
                    <!-- Foto jika judul adalah "Sambutan Kepala Sekolah" -->
                    @if(strtolower($profile->judul) === 'sambutan kepala sekolah')
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('assets/images/logo/kepala4.jpg') }}" alt="Sambutan Kepala Sekolah" class="img-fluid rounded-circle shadow-sm kepala4-image">
                    </div>
                    @endif

                    <!-- Teks -->
                    <div class="{{ strtolower($profile->judul) === 'sambutan kepala sekolah' ? 'col-md-8' : 'col-12' }}">
                        <div class="card-body p-4">
                            <h3 class="fw-bold text-primary">{{ $profile->judul }}</h3>
                            <hr class="divider-modern">
                            <div class="profile-content text-muted">
                                {!! $profile->isi !!}
                            </div>

                            <!-- Menampilkan foto jurusan jika judul adalah "Kompetansi Keahlian :" -->
                            @if($profile->judul === 'Kompetansi Keahlian :')
                            <div class="row mt-4">
                                <div class="col-md-3 mb-3 text-center">
                                    <div class="image-container">
                                        <img src="/assets/images/jurusan/pplg.png" alt="Jurusan PPLG" class="img-fluid rounded shadow">
                                    </div>
                                    <p class="mt-2 fs-5"><em>Pengembangan Perangkat Lunak dan Gim (PPLG)</em></p>
                                </div>
                                <div class="col-md-3 mb-3 text-center">
                                    <div class="image-container">
                                        <img src="/assets/images/jurusan/tkj.png" alt="Jurusan TJKT" class="img-fluid rounded shadow">
                                    </div>
                                    <p class="mt-2 fs-5"><em>Teknik Komputer Jaringan dan Telekomunikasi (TJKT)</em></p>
                                </div>
                                <div class="col-md-3 mb-3 text-center">
                                    <div class="image-container">
                                        <img src="/assets/images/jurusan/tp.jpeg" alt="Jurusan TP" class="img-fluid rounded shadow">
                                    </div>
                                    <p class="mt-2 fs-5"><em>Teknik Pengelasan (TP)</em></p>
                                </div>
                                <div class="col-md-3 mb-3 text-center">
                                    <div class="image-container">
                                        <img src="/assets/images/jurusan/tkr.png" alt="Jurusan TKR" class="img-fluid rounded shadow">
                                    </div>
                                    <p class="mt-2 fs-5"><em>Teknik Otomotif (TO)</em></p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <!-- Empty State -->
            <div class="empty-state text-center py-5">
                <div class="empty-state-icon">
                    <i class="fas fa-exclamation-circle text-danger fs-1"></i>
                </div>
                <h4 class="fw-bold mt-3">Belum Ada Data Profil</h4>
                <p class="text-muted">Data akan segera tersedia. Terima kasih atas kesabarannya.</p>
            </div>
            @endforelse
        </div>
    </div>
</div>

<style>
    img {
        max-width: 100%;
        height: auto;
        object-fit: cover;
    }

    .kepala4-image {
        max-width: 100%;
        height: auto;
        object-fit: cover;
        margin-right: 15px;
    }

    .text-gradient {
        background: linear-gradient(45deg, #2152ff, #21d4fd);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    .divider-gradient {
        display: inline-block;
        width: 80px;
        height: 5px;
        margin: 1rem auto;
        background: linear-gradient(90deg, #2152ff, #21d4fd);
        border-radius: 50px;
        position: relative;
    }

    .divider-gradient span {
        position: absolute;
        top: -12px;
        left: 50%;
        transform: translateX(-50%);
        font-size: 1.5rem;
        color: #2152ff;
        background: white;
        padding: 5px 10px;
        border-radius: 50%;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .profile-card-modern {
        background: #ffffff;
        border-radius: 20px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .profile-card-modern:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .card-body {
        position: relative;
        z-index: 2;
        background: linear-gradient(to bottom, #ffffff, #f9f9f9);
        text-align: justify;
    }

    .image-container {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .image-container:hover {
        transform: scale(1.05);
        box-shadow: 0 6px 30px rgba(0, 0, 0, 0.2);
    }

    .image-container img {
        transition: transform 0.3s ease;
    }

    .image-container:hover img {
        transform: scale(1.1);
    }
</style>
@endsection
