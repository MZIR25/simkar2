<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Jobdesk>
 */
class JobdeskFactory extends Factory
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
            'Tugas_Karyawan' => $this->faker->words(5, true),
        ];
    }
}
