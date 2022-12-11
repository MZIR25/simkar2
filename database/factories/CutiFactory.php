<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cuti>
 */
class CutiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'karyawan_id' => KaryawanFactory::new(),
            'Alasan_Cuti' => $this->faker->words(5, true),
            'Status' => $this->faker->words(1, true),
            'Tanggal_Mulai' => $this->faker->date,
            'Keterangan_Status' => $this->faker->words(5, true),
            'Tanggal_Selesai' => $this->faker->date
        ];
    }
}
