@extends('admin.layout')
@section('content')
<div class="row">
    <div class="col-12 col-md-4">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Judul Post</td>
                        <td>:</td>
                        <td>{{ $gallery->post->title }}</td>
                    </tr>
                    <tr>
                        <td>Posisi</td>
                        <td>:</td>
                        <td>{{ $gallery->position ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>:</td>
                        <td>
                            @if ($gallery->status == 'aktif')
                            <span class="badge bg-success">{{ Str::ucfirst($gallery->status) }}</span>
                            @else
                            <span class="badge bg-warning">{{ Str::ucfirst($gallery->status) }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Dibuat pada</td>
                        <td>:</td>
                        <td>{{ \Carbon\Carbon::parse($gallery->created_at)->format('d M Y') }}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <div class="col-12 col-md-8">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="m-0 p-0"><i data-feather="image"></i> Foto</h4>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addImageModal">+ Foto</button>
            </div>
            <div class="card-body bg-light">
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="m-0 p-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="row">
                    @forelse ($gallery->images as $image)
                        <div class="col-12 col-md-4 mb-3">
                            <div class="card">
                                <img src="{{ asset('images/' . $image->file) }}" alt="{{ $image->title }}" class="img-fluid">
                                <div class="p-2">
                                    <h5>{{ $image->title }}</h5>
                                    <button class="btn btn-link btn-sm" data-bs-toggle="modal" data-bs-target="#editImageModal{{ $image->id }}">
                                        <i data-feather="edit-3" class="text-primary"></i>
                                    </button>
                                    <form action="/images/{{ $image->id }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link btn-sm" onclick="return confirm('Apakah Anda yakin?')">
                                            <i data-feather="trash-2" class="text-danger"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="editImageModal{{ $image->id }}" tabindex="-1" aria-labelledby="editImageModalLabel{{ $image->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <form action="/images/{{ $image->id }}" method="POST" enctype="multipart/form-data" class="modal-content">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5 text-secondary" id="editImageModalLabel{{ $image->id }}">Edit Foto</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-secondary">
                                        <input type="hidden" name="gallery_id" value="{{ $gallery->id }}">
                                        <div class="mb-3">
                                            <label for="file">Foto Baru (Opsional)</label>
                                            <input type="file" name="file" id="file" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="title">Judul</label>
                                            <input type="text" name="title" id="title" class="form-control" value="{{ $image->title }}" required>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-warning">Tidak ada foto.</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Foto -->
<div class="modal fade" id="addImageModal" tabindex="-1" aria-labelledby="addImageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="/images/store" method="POST" enctype="multipart/form-data" class="modal-content">
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-secondary" id="addImageModalLabel">+ Foto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-secondary">
                <input type="hidden" name="gallery_id" value="{{ $gallery->id }}">
                <div class="mb-3">
                    <label for="file">Foto</label>
                    <input type="file" name="file" id="file" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="title">Judul</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
