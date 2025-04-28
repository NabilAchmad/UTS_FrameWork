<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Riwayat Pemesanan Tiket yang Dihapus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>
<body>
    <div class="container py-6">
        <div class="d-flex justify-content-between align-items-center mb-4 bg-secondary text-white p-3 rounded">
            <h4 class="mb-0">Riwayat Pemesanan Tiket yang Dihapus</h4>
            <a href="{{ route('pemesanan.read') }}" class="btn btn-light btn-sm">
                <i class="bi bi-arrow-left-circle"></i> Kembali ke Daftar Pemesanan
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover mb-0">
                <thead class="table-dark">
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
                    @forelse ($riwayatpemesanan as $p)
                    <tr>
                        <td>{{ $p->nama_pemesan }}</td>
                        <td>{{ $p->email }}</td>
                        <td>{{ $p->nama_konser }}</td>
                        <td>{{ \Carbon\Carbon::parse($p->tanggal_konser)->format('d M Y') }}</td>
                        <td>{{ $p->jumlah_tiket }}</td>
                        <td>{{ $p->kategori_tiket }}</td>
                        <td>
                            @if($p->status_pemesanan == 'terkonfirmasi')
                                <span class="badge bg-success">Terkonfirmasi</span>
                            @elseif($p->status_pemesanan == 'pending')
                                <span class="badge bg-warning text-dark">Pending</span>
                            @elseif($p->status_pemesanan == 'dibatalkan')
                                <span class="badge bg-danger">Dibatalkan</span>
                            @else
                                <span class="badge bg-secondary">{{ $p->status_pemesanan }}</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('pemesanan.restore', $p->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PATCH')
                                <button class="btn btn-sm btn-info" type="submit" title="Restore">
                                    <i class="bi bi-arrow-clockwise"></i> Restore
                                </button>
                            </form>
                            <form action="{{ route('pemesanan.forceDelete', $p->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin hapus permanen?')" title="Hapus Permanen">
                                    <i class="bi bi-trash"></i> Hapus Permanen
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada riwayat pemesanan yang dihapus.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-end p-3">
            {{ $riwayatpemesanan->links() }}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>
</html>
