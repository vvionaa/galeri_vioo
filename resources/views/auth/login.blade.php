<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Web Galeri Sekolah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      body {
        background: linear-gradient(135deg, #1a73e8, #4a90e2); /* Gradasi biru */
        color: #fff;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .card {
        background: #ffffff; /* Warna putih untuk kontras */
        border: none;
        border-radius: 10px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); /* Bayangan lembut */
        overflow: hidden;
      }
      .btn-primary {
        background: linear-gradient(135deg, #4a90e2, #1a73e8); /* Gradasi biru pada tombol */
        border: none;
      }
      .btn-primary:hover {
        background: linear-gradient(135deg, #1a73e8, #1558b1); /* Gradasi lebih gelap saat hover */
      }
      .form-label {
        color: #333; /* Warna teks label */
      }
      .form-text {
        color: #777; /* Teks kecil berwarna abu */
      }
      h3 {
        color: #1a73e8;
        font-weight: bold;
      }
    </style>
  </head>

  <body>
    <div class="container">
      <div class="w-50 mx-auto">
        <div class="card">
          <div class="card-body px-4 my-4">
            <h3 class="text-center mb-4">Login</h3>
            @if (session('error'))
            <div class="alert alert-danger fade show" role="alert">
              {{ session('error') }}
            </div>
            @endif
            <form action="/login" method="post">
              @csrf
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
              </div>
              <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
              </div>
              <button type="submit" class="btn btn-primary d-block mx-auto mt-4">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
