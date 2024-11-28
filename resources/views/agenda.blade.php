@extends('home')

@section('title', 'Agenda')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Bagian Header -->
            <div class="text-center mb-5">
                <h1 class="display-3 fw-bold text-gradient">Agenda Sekolah</h1>
                <p class="text-muted fs-5">Jadwal kegiatan dan acara penting di sekolah kami.</p>
                <div class="divider-gradient">
                    <span><i data-feather="calendar" class="feather-icon"></i></span>
                </div>
            </div>

            <!-- Daftar Agenda -->
            <div class="row">
                @forelse($posts as $post)
                <div class="col-md-4 mb-4">
                    <div class="agenda-card-modern shadow-lg">
                        <div class="card-body p-4">
                            <!-- Ikon Kalender Feather -->
                            <div class="agenda-icon text-center">
                                <i data-feather="calendar" class="feather-icon"></i>
                            </div>
                            <h5 class="fw-bold text-primary mt-3">{{ $post->title }}</h5>
                            <p class="text-muted small mb-3"><i class="fas fa-clock"></i> {{ $post->created_at->format('d M Y, H:i') }}</p>
                            <hr class="divider-modern">
                            <div class="agenda-content text-muted">
                                <p>{{ $post->content }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="empty-state text-center py-5">
                    <div class="empty-state-icon">
                        <i class="fas fa-calendar-times text-danger fs-1"></i>
                    </div>
                    <h4 class="fw-bold mt-3">Tidak ada agenda saat ini</h4>
                    <p class="text-muted">Agenda sekolah akan ditampilkan di sini setelah ditambahkan.</p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

<style>
    /* Styling Header */
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

    /* Kartu Agenda */
    .agenda-card-modern {
        background: #ffffff;
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
    }

    .agenda-card-modern:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .card-body {
        background: linear-gradient(to bottom, #ffffff, #f9f9f9);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    /* Ikon Kalender Feather */
    .agenda-icon i {
        font-size: 3rem;
        color: #2152ff;
    }

    .divider-modern {
        border: 0;
        height: 3px;
        background: linear-gradient(90deg, #2152ff, #21d4fd);
        border-radius: 50px;
        margin: 1rem 0;
    }

    .agenda-content {
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

    /* Responsivitas */
    @media (max-width: 768px) {
        .agenda-card-modern {
            margin-bottom: 20px;
        }

        .agenda-icon i {
            font-size: 2.5rem;
        }
    }
</style>

@push('scripts')
    <!-- Feather Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
    <script>
        feather.replace(); // Mengganti semua ikon Feather yang ada pada halaman
    </script>
@endpush

@endsection
