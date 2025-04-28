<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemesan');
            $table->string('email');
            $table->string('nama_konser');
            $table->date('tanggal_konser');
            $table->integer('jumlah_tiket');
            $table->enum('kategori_tiket', ['VIP', 'Reguler', 'Festival']);
            $table->enum('status_pemesanan', ['terkonfirmasi', 'pending', 'dibatalkan']);
            $table->timestamps();     // created_at, updated_at
            $table->softDeletes();    // deleted_at -> untuk riwayat (Soft Delete)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
