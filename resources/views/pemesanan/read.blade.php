<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Pemesanan Tiket Konser</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
    <div class="container py-6">
        <nav class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 fw-bold">Daftar Pemesanan Tiket Konser</h1>
            <div>
                <a href="{{ route('pemesanan.read') }}" class="text-primary text-decoration-none me-3">Daftar Pemesanan</a>
                <a href="{{ route('pemesanan.riwayat') }}" class="text-secondary text-decoration-none me-3">Riwayat Dihapus</a>
                <a href="{{ route('pemesanan.create') }}" class="btn btn-primary">+ Tambah Pemesanan</a>
            </div>
        </nav>

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>Nama Pemesan</th>
                        <th>Email</th>
                        <th>Nama Konser</th>
                        <th>Tanggal Konser</th>
                        <th>Jumlah Tiket</th>
                        <th>Kategori Tiket</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pemesanan as $p)
                    <tr>
                        <td>{{ $p->nama_pemesan }}</td>
                        <td>{{ $p->email }}</td>
                        <td>{{ $p->nama_konser }}</td>
                        <td>{{ \Carbon\Carbon::parse($p->tanggal_konser)->format('d M Y') }}</td>
                        <td>{{ $p->jumlah_tiket }}</td>
                        <td>{{ $p->kategori_tiket }}</td>
                        <td>
                            @if (strtolower($p->status_pemesanan) == 'terkonfirmasi')
                                <span class="badge bg-success">Terkonfirmasi</span>
                            @elseif (strtolower($p->status_pemesanan) == 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif (strtolower($p->status_pemesanan) == 'dibatalkan')
                                <span class="badge bg-danger">Dibatalkan</span>
                            @else
                                <span class="badge bg-secondary">{{ $p->status_pemesanan }}</span>
                            @endif
                        </td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('pemesanan.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('pemesanan.delete', $p->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-end mt-4">
            {{ $pemesanan->links() }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
