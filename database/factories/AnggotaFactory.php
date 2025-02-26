<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Anggota>
 */
class AnggotaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' =>$this->faker->name(),
            'email' =>$this->faker->email(),
            'alamat' =>$this->faker->address(),
            'telepon' =>$this->faker->phoneNumber(),
        ];
    }
}
