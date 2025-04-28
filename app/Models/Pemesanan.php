<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemesanan extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pemesanans'; // Nama tabel

    protected $fillable = [
        'nama_pemesan',
        'email',
        'nama_konser',
        'tanggal_konser',
        'jumlah_tiket',
        'kategori_tiket',
        'status_pemesanan',
    ];

    protected $dates = ['deleted_at'];

    /**
     * Scope a query to only include soft deleted records.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOnlyDeleted($query)
    {
        return $query->onlyTrashed();
    }
}
