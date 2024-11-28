@extends('admin.layout')

@section('title', 'Daftar Petugas')

@section('content')
    <h1 class="mb-4">Daftar Petugas</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ url('/petugas/create') }}" class="btn btn-primary mb-3">Tambah Petugas</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($petugas as $index => $petugasItem) <!-- Ubah dari $users ke $petugas -->
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $petugasItem->name }}</td>
                    <td>{{ $petugasItem->email }}</td>
                    <td>
                        <a href="{{ url('/petugas/' . $petugasItem->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ url('/petugas/' . $petugasItem->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus petugas ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($petugas->isEmpty())
        <p class="text-center">Belum ada petugas yang terdaftar.</p>
    @endif
@endsection