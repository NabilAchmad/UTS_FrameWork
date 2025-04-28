<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    // Menampilkan semua data pemesanan (yang aktif)
    public function index()
    {
        $pemesanan = Pemesanan::paginate(8); // Pagination maksimal 8 data per halaman
        return view('pemesanan.read', compact('pemesanan'));
    }

    // Menampilkan form tambah pemesanan
    public function create()
    {
        return view('pemesanan.create');
    }

    // Menyimpan data pemesanan baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nama_konser' => 'required|string|max:255',
            'tanggal_konser' => 'required|date',
            'jumlah_tiket' => 'required|integer|min:1',
            'kategori_tiket' => 'required|in:VIP,Reguler,Festival',
            'status_pemesanan' => 'required|in:terkonfirmasi,pending,dibatalkan',
        ]);

        Pemesanan::create($request->all());

        return redirect()->route('pemesanan.read')->with('success', 'Pemesanan berhasil ditambahkan.');
    }

    // Menampilkan detail satu pemesanan
    public function show($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        return view('pemesanan.show', compact('pemesanan'));
    }

    // Menampilkan form edit pemesanan
    public function edit($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        return view('pemesanan.edit', compact('pemesanan'));
    }

    // Menyimpan perubahan data pemesanan
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_pemesan' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nama_konser' => 'required|string|max:255',
            'tanggal_konser' => 'required|date',
            'jumlah_tiket' => 'required|integer|min:1',
            'kategori_tiket' => 'required|in:VIP,Reguler,Festival',
            'status_pemesanan' => 'required|in:terkonfirmasi,pending,dibatalkan',
        ]);

        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->update($request->all());

        return redirect()->route('pemesanan.read')->with('success', 'Pemesanan berhasil diperbarui.');
    }

    // Menghapus pemesanan (Soft Delete)
    public function destroy($id)
    {
        $pemesanan = Pemesanan::findOrFail($id);
        $pemesanan->delete();

        return redirect()->route('pemesanan.read')->with('success', 'Pemesanan berhasil dihapus.');
    }

    // ========================
    // Bagian Riwayat Pemesanan Dihapus
    // ========================

    // Menampilkan daftar pemesanan yang sudah dihapus
    public function riwayat()
    {
        $riwayatpemesanan = Pemesanan::onlyTrashed()->paginate(8); // Pagination riwayat
        return view('pemesanan.riwayat', compact('riwayatpemesanan'));
    }

    // Restore (mengembalikan) data yang terhapus
    public function restore($id)
    {
        $pemesanan = Pemesanan::onlyTrashed()->findOrFail($id);
        $pemesanan->restore();

        return redirect()->route('pemesanan.riwayat')->with('success', 'Pemesanan berhasil dipulihkan.');
    }

    // Menghapus permanen data dari database
    public function forceDelete($id)
    {
        $pemesanan = Pemesanan::onlyTrashed()->findOrFail($id);
        $pemesanan->forceDelete();

        return redirect()->route('pemesanan.riwayat')->with('success', 'Pemesanan berhasil dihapus permanen.');
    }
}
