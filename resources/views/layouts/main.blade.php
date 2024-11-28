<!-- resources/views/layouts/main.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Website Sekolah')</title>
    <!-- Tambahkan Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        header {
            background: linear-gradient(to right, #007bff, #0056b3);
            color: white;
        }
        header h1, header p {
            color: white;
        }
        .navbar {
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .navbar-brand {
            font-weight: bold;
        }
        .nav-link:hover {
            text-decoration: underline;
        }
        footer {
            background: #222;
            color: #bbb;
        }
        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <!-- Header -->
    @include('navbar')

    <div class="container my-3">
        <!-- Menampilkan konten halaman -->
        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="text-center py-4 mt-auto">
        <div class="container">
            <p>&copy; {{ date('Y') }} SMK NEGERI 4 KOTA BOGOR. Semua Hak Cipta Dilindungi.</p>
            <p>
                <a href="#" class="text-white text-decoration-none">Kebijakan Privasi</a> | 
                <a href="#" class="text-white text-decoration-none">Syarat dan Ketentuan</a>
            </p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
