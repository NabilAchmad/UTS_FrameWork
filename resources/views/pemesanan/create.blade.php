<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Form Pemesanan Tiket Konser</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
    <div class="container py-6">
        <h2 class="mb-4">Form Pemesanan Tiket Konser</h2>

        <form action="{{ route('pemesanan.store') }}" method="POST" class="max-w-lg">
            @csrf

            <div class="mb-3">
                <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
                <input type="text" class="form-control @error('nama_pemesan') is-invalid @enderror" id="nama_pemesan" name="nama_pemesan" value="{{ old('nama_pemesan') }}" required>
                @error('nama_pemesan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email Pemesan</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama_konser" class="form-label">Nama Konser</label>
                <input type="text" class="form-control @error('nama_konser') is-invalid @enderror" id="nama_konser" name="nama_konser" value="{{ old('nama_konser') }}" required>
                @error('nama_konser')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tanggal_konser" class="form-label">Tanggal Konser</label>
                <input type="date" class="form-control @error('tanggal_konser') is-invalid @enderror" id="tanggal_konser" name="tanggal_konser" value="{{ old('tanggal_konser') }}" required>
                @error('tanggal_konser')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="jumlah_tiket" class="form-label">Jumlah Tiket</label>
                <input type="number" class="form-control @error('jumlah_tiket') is-invalid @enderror" id="jumlah_tiket" name="jumlah_tiket" value="{{ old('jumlah_tiket') }}" min="1" required>
                @error('jumlah_tiket')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="kategori_tiket" class="form-label">Kategori Tiket</label>
                <select class="form-select @error('kategori_tiket') is-invalid @enderror" id="kategori_tiket" name="kategori_tiket" required>
                    <option value="">-- Pilih Kategori --</option>
                    <option value="VIP" {{ old('kategori_tiket') == 'VIP' ? 'selected' : '' }}>VIP</option>
                    <option value="Reguler" {{ old('kategori_tiket') == 'Reguler' ? 'selected' : '' }}>Reguler</option>
                    <option value="Festival" {{ old('kategori_tiket') == 'Festival' ? 'selected' : '' }}>Festival</option>
                </select>
                @error('kategori_tiket')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="status_pemesanan" class="form-label">Status Pemesanan</label>
                <select class="form-select @error('status_pemesanan') is-invalid @enderror" id="status_pemesanan" name="status_pemesanan" required>
                    <option value="">-- Pilih Status --</option>
                    <option value="terkonfirmasi" {{ old('status_pemesanan') == 'terkonfirmasi' ? 'selected' : '' }}>Terkonfirmasi</option>
                    <option value="pending" {{ old('status_pemesanan') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="dibatalkan" {{ old('status_pemesanan') == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                </select>
                @error('status_pemesanan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Pesan Tiket</button>
            <a href="{{ route('pemesanan.read') }}" class="btn btn-secondary ms-2">Kembali</a>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
