<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pemesanan;

class PemesananSeeder extends Seeder
{
    public function run(): void
    {
        Pemesanan::factory()->count(20)->create();
    }
}
