<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Mahasiswa;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Mahasiswa>
 */
class MahasiswaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Nim' => fake()->numerify('214172####'),
            'Nama' => fake()->name(),
            'kelas' => fake()->regexify('TI-2[A-I]{1}'),
            'Jurusan' => 'Teknologi Informasi',
            'No_Handphone' => fake()->regexify('08[0-9]{10}'),
            'Email' => fake()->unique()->safeEmail(),
            'TanggalLahir' => fake()->date(),
        ];
    }
}
