<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pendidikan>
 */
class PendidikanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'Tingkat_Pendidikan' => $this->faker->title,
            'Tahun_Lulus' => $this->faker->year,
            'Nama_Sekolah' => $this->faker->streetName(),
        ];
    }
}
