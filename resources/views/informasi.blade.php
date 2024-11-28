@extends('home')

@section('title', 'Informasi')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Header Section -->
            <div class="text-center mb-5">
                <h1 class="display-3 fw-bold text-gradient">Informasi Sekolah</h1>
                <p class="text-muted fs-5">Berita dan pengumuman penting dari sekolah kami.</p>
                <div class="divider-gradient">
                    <span><i class="fas fa-info-circle"></i></span>
                </div>
            </div>

            <!-- Informasi List -->
            <div class="row">
                @forelse($posts as $post)
                <div class="col-12 mb-5">
                    <div class="info-card-modern shadow-lg">
                        <div class="card-body p-4">
                            <h5 class="fw-bold text-primary">{{ $post->title }}</h5>
                            <p class="text-muted small mb-3"><i class="fas fa-calendar-alt"></i> {{ $post->created_at->format('d M Y') }}</p>
                            <hr class="divider-modern">
                            <div class="info-content text-muted">
                                <p>{{ $post->content }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="empty-state text-center py-5">
                    <div class="empty-state-icon">
                        <i class="fas fa-folder-open text-warning fs-1"></i>
                    </div>
                    <h4 class="fw-bold mt-3">Tidak ada informasi saat ini</h4>
                    <p class="text-muted">Informasi terbaru akan ditampilkan di sini jika telah ditambahkan.</p>
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

    /* Info Card Modern */
    .info-card-modern {
        background: #ffffff;
        border-radius: 20px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .info-card-modern:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .card-body {
        background: linear-gradient(to bottom, #ffffff, #f9f9f9);
    }

    .divider-modern {
        border: 0;
        height: 3px;
        background: linear-gradient(90deg, #2152ff, #21d4fd);
        border-radius: 50px;
        margin: 1rem 0;
    }

    .info-content {
        font-size: 1rem;
        line-height: 1.6;
        color: #333;
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
        .info-card-modern {
            margin-bottom: 20px;
        }
    }
</style>
@endsection
