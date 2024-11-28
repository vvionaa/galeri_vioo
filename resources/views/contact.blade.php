@extends('layouts.app')

@section('title', 'Kontak Kami')

@section('content')
    <div class="container my-5">
        <h2 class="text-center mb-4">Kontak Kami</h2>
        <p class="lead text-center">Kami siap membantu Anda! Jangan ragu untuk menghubungi kami melalui informasi berikut.</p>

        <div class="row mt-5">
            <div class="col-md-6">
                <h4>Informasi Kontak</h4>
                <p><strong>Alamat:</strong> Jl. Pendidikan No. 123, Kota Pendidikan</p>
                <p><strong>Telepon:</strong> (021) 123-4567</p>
                <p><strong>Email:</strong> info@sekolahku.ac.id</p>
            </div>
            <div class="col-md-6">
                <h4>Kirim Pesan</h4>
                <form action="#" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Anda">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Alamat Email">
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Pesan</label>
                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Tulis pesan Anda di sini"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </div>
@endsection
