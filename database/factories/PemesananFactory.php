<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PemesananFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama_pemesan' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'nama_konser' => $this->faker->word(),
            'tanggal_konser' => $this->faker->date(),
            'jumlah_tiket' => $this->faker->numberBetween(1, 5),
            'kategori_tiket' => $this->faker->randomElement(['VIP', 'Reguler', 'Festival']),
            'status_pemesanan' => $this->faker->randomElement(['terkonfirmasi', 'pending', 'dibatalkan']),
        ];
    }
}
