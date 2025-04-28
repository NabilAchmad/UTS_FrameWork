<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Pemesanan Tiket Konser</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
</head>
<body>
    <div class="container mx-auto px-4 py-6">
        <h2 class="text-2xl font-bold mb-6">Edit Pemesanan Tiket Konser</h2>

        <form action="{{ route('pemesanan.update', $pemesanan->id) }}" method="POST" class="space-y-4 max-w-lg">
            @csrf
            @method('PUT')

            <div>
                <label for="nama_pemesan" class="block font-semibold mb-1">Nama Pemesan</label>
                <input type="text" id="nama_pemesan" name="nama_pemesan" value="{{ old('nama_pemesan', $pemesanan->nama_pemesan) }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 @error('nama_pemesan') border-red-500 @enderror" />
                @error('nama_pemesan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block font-semibold mb-1">Email Pemesan</label>
                <input type="email" id="email" name="email" value="{{ old('email', $pemesanan->email) }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 @error('email') border-red-500 @enderror" />
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="nama_konser" class="block font-semibold mb-1">Nama Konser</label>
                <input type="text" id="nama_konser" name="nama_konser" value="{{ old('nama_konser', $pemesanan->nama_konser) }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 @error('nama_konser') border-red-500 @enderror" />
                @error('nama_konser')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="tanggal_konser" class="block font-semibold mb-1">Tanggal Konser</label>
                <input type="date" id="tanggal_konser" name="tanggal_konser" value="{{ old('tanggal_konser', $pemesanan->tanggal_konser) }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 @error('tanggal_konser') border-red-500 @enderror" />
                @error('tanggal_konser')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="jumlah_tiket" class="block font-semibold mb-1">Jumlah Tiket</label>
                <input type="number" id="jumlah_tiket" name="jumlah_tiket" min="1" value="{{ old('jumlah_tiket', $pemesanan->jumlah_tiket) }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 @error('jumlah_tiket') border-red-500 @enderror" />
                @error('jumlah_tiket')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="kategori_tiket" class="block font-semibold mb-1">Kategori Tiket</label>
                <select id="kategori_tiket" name="kategori_tiket" required
                    class="w-full border border-gray-300 rounded px-3 py-2 @error('kategori_tiket') border-red-500 @enderror">
                    <option value="">-- Pilih Kategori --</option>
                    <option value="VIP" {{ old('kategori_tiket', $pemesanan->kategori_tiket) == 'VIP' ? 'selected' : '' }}>VIP</option>
                    <option value="Reguler" {{ old('kategori_tiket', $pemesanan->kategori_tiket) == 'Reguler' ? 'selected' : '' }}>Reguler</option>
                    <option value="Festival" {{ old('kategori_tiket', $pemesanan->kategori_tiket) == 'Festival' ? 'selected' : '' }}>Festival</option>
                </select>
                @error('kategori_tiket')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status_pemesanan" class="block font-semibold mb-1">Status Pemesanan</label>
                <select id="status_pemesanan" name="status_pemesanan" required
                    class="w-full border border-gray-300 rounded px-3 py-2 @error('status_pemesanan') border-red-500 @enderror">
                    <option value="">-- Pilih Status --</option>
                    <option value="terkonfirmasi" {{ old('status_pemesanan', $pemesanan->status_pemesanan) == 'terkonfirmasi' ? 'selected' : '' }}>Terkonfirmasi</option>
                    <option value="pending" {{ old('status_pemesanan', $pemesanan->status_pemesanan) == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="dibatalkan" {{ old('status_pemesanan', $pemesanan->status_pemesanan) == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                </select>
                @error('status_pemesanan')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex space-x-4 mt-6">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">Update Pemesanan</button>
                <a href="{{ route('pemesanan.read') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded">Batal</a>
            </div>
        </form>
    </div>
</body>
</html>
