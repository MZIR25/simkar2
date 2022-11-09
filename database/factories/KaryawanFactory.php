<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karyawan>
 */
class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'Nama_Karyawan' => $this->faker->name,
            'jabatan_id' => 1,
            'devisi_id' => 1,
            'pendidikan_id' => 1,
            'Alamat_Karyawan' => $this->faker->address,
            'Tempat_Lahir' => 'Balikpapan',
            'Tanggal_Lahir' => $this->faker->date,
            'Agama' => 'islam',
            'Golongan_Darah' => '-',
            'Status_Pernikahan' => 'Lajang',
            'Jumlah_Anak' => '0',
            'No_Hp' => '1111111111',
            'Mulai_Kerja' => $this->faker->date,
            'STATUS' => 'Active',


        ];
    }
}
