<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asset>
 */
class AssetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_asset' => strtoupper(Str::random(6)), // Kode unik max 6 karakter
            'nama_asset' => $this->faker->word(),
            'kategori' => $this->faker->randomElement(['elektronik', 'kendaraan', 'peralatan', 'lainnya']),
            'stock' => $this->faker->numberBetween(1, 100),
            'deskripsi' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['tersedia', 'rusak', 'dipinjam']),
        ];
    }
}
