@extends('home')

@section('title', 'Galeri')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header Section -->
            <div class="text-center mb-5">
                <h1 class="display-3 fw-bold text-gradient">Galeri Sekolah</h1>
                <p class="text-muted fs-5">Lihat momen-momen terbaik dari kegiatan dan fasilitas di sekolah kami.</p>
                <div class="divider-gradient">
                    <span><i class="fas fa-camera-retro"></i></span>
                </div>
            </div>

            <!-- Galeri Grid -->
            <div class="row">
            @forelse($galleries as $gallery)
<div class="col-md-4 mb-5">
    <div class="gallery-card-modern shadow-lg">
        @if($gallery->firstImage)
        <img src="{{ asset('images/' . $gallery->firstImage->file) }}" alt="{{ $gallery->firstImage->title }}" class="img-fluid gallery-image">
        @else
        <img src="{{ asset('images/default.jpg') }}" alt="Default Image" class="img-fluid gallery-image">
        @endif
        <div class="card-body p-4 text-center">
            <!-- Menampilkan kolom title -->
            <h4>{{ $gallery->post->title ?? 'Judul tidak tersedia' }}</h4>
        </div>
    </div>
</div>
@empty
<div class="empty-state text-center py-5">
    <div class="empty-state-icon">
        <i class="fas fa-folder-open text-danger fs-1"></i>
    </div>
    <h4 class="fw-bold mt-3">Belum ada gambar yang tersedia</h4>
    <p class="text-muted">Data galeri akan ditampilkan di sini jika telah ditambahkan.</p>
</div>
@endforelse

            </div>
        </div>
    </div>
</div>

<style>
    /* Header Styling */
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

    /* Galeri Card Modern */
    .gallery-card-modern {
        background: #ffffff;
        border-radius: 20px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .gallery-card-modern:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .gallery-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-bottom: 3px solid #2152ff;
    }

    .card-body {
        background: linear-gradient(to bottom, #ffffff, #f9f9f9);
        text-align: center;
    }

    /* Empty State */
    .empty-state {
        background: #f8f9fa;
        border: 2px dashed #ddd;
        border-radius: 15px;
    }

    .empty-state-icon {
        font-size: 3rem;
    }

    /* Responsiveness */
    @media (max-width: 768px) {
        .gallery-image {
            height: 150px;
        }
    }
</style>
@endsection
