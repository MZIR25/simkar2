<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Gaji>
 */
class GajiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $gaji = $this->faker->numberBetween(0, 10_000_000);
        $pajak = $this->faker->numberBetween(0, $gaji * 0.2);
        return [
            'karyawan_id' => KaryawanFactory::new(),
            'Gaji_Pokok' => $gaji,
            'Pajak_Bpjs' => $pajak,
            'Jumlah_Gaji' => $gaji - $pajak,
        ];
    }
}
