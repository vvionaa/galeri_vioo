<div class="container mt-5 d-flex justify-content-center">
    <form action="/petugas/{{ $petugas->id }}" method="POST" class="p-5 border rounded-3 shadow-lg" style="background-color: #ffffff; max-width: 600px; width: 100%; border: 2px solid #e0e0e0;">
        @csrf
        @method('PUT')

        <h2 class="text-center mb-4" style="color: #333;">Edit Data Petugas</h2>

        <div class="mb-4">
            <label for="name" class="form-label fs-5">Nama:</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text bg-light" style="border: 2px solid #e0e0e0;">
                    <i class="bi bi-person" style="font-size: 1.2rem;"></i>
                </span>
                <input type="text" name="name" id="name" value="{{ $petugas->name }}" class="form-control" style="border: 2px solid #e0e0e0;" required>
            </div>
        </div>

        <div class="mb-4">
            <label for="email" class="form-label fs-5">Email:</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text bg-light" style="border: 2px solid #e0e0e0;">
                    <i class="bi bi-envelope" style="font-size: 1.2rem;"></i>
                </span>
                <input type="email" name="email" id="email" value="{{ $petugas->email }}" class="form-control" style="border: 2px solid #e0e0e0;" required>
            </div>
        </div>

        <div class="mb-4">
            <label for="password" class="form-label fs-5">Password (Opsional):</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text bg-light" style="border: 2px solid #e0e0e0;">
                    <i class="bi bi-lock" style="font-size: 1.2rem;"></i>
                </span>
                <input type="password" name="password" id="password" class="form-control" style="border: 2px solid #e0e0e0;">
            </div>
        </div>

        <button type="submit" class="btn btn-primary w-100 mt-4 py-3 fs-5" style="background-color: #007bff; border: none; transition: background-color 0.3s;">
            Update
        </button>
    </form>
</div>