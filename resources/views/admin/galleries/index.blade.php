@extends('admin.layout')

@section('title', 'Daftar Galeri')

@section('content')
    <h1 class="mb-4">Daftar Galeri</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ url('/galleries/create') }}" class="btn btn-primary mb-3">+ Galeri</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul Post</th>
                <th>Posisi</th>
                <th>Status</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($galleries as $index => $gallery)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $gallery->post->title }}</td>
                    <td>{{ $gallery->position }}</td>
                    <td>
                    @if ($gallery->status == 'aktif')
                                    <span class="badge bg-success">{{ Str::ucfirst($gallery->status) }}</span>
                                @else
                                    <span class="badge bg-warning">{{ Str::ucfirst($gallery->status) }}</span>
                                @endif
                    </td>
                    <td class="text-center">
                        <div class="d-flex justify-content-center">
                            <a href="/galleries/{{ $gallery->id }}" class="btn btn-success btn-sm mx-1">
                                <i data-feather="info"></i> Detail
                            </a>
                            <a href="{{ url('/galleries/' . $gallery->id . '/edit') }}" class="btn btn-warning btn-sm mx-1">
                                <i data-feather="edit"></i> Edit
                            </a>
                            <form action="{{ url('/galleries/' . $gallery->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-sm mx-1" onclick="return confirm('Yakin ingin menghapus galeri ini?')">
                                    <i data-feather="trash-2"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($galleries->isEmpty())
        <p class="text-center">Belum ada galeri yang terdaftar.</p>
    @endif
@endsection