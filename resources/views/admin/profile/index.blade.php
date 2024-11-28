@extends('admin.layout')

@section('title', 'Daftar Profile')

@section('content')
    <h1 class="mb-4">Daftar Profile</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('profile.create') }}" class="btn btn-primary mb-3">Tambah Profile</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Tanggal Ditambahkan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($profiles as $index => $profile)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $profile->judul }}</td>
                    <td>{{ Str::limit($profile->isi, 50) }}</td>
                    <td>{{ $profile->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ url('/admin/profile/' . $profile->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ url('/admin/profile/' . $profile->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus profile ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Belum ada profile yang terdaftar.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
