@extends('admin.layout')

@section('title', 'Daftar categories')

@section('content')
    <h1 class="mb-4">Daftar categories</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ url('/categories/create') }}" class="btn btn-primary mb-3">Tambah Kategori</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $index => $categoryItem) <!-- Ubah dari $users ke $categories -->
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $categoryItem->title }}</td>
                    <td>
                        <a href="{{ url('/categories/' . $categoryItem->id . '/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ url('/categories/' . $categoryItem->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus categories ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @if($categories->isEmpty())
        <p class="text-center">Belum ada categories yang terdaftar.</p>
    @endif
@endsection