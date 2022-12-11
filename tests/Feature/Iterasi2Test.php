<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithoutMiddleware;

class Iterasi2Test extends TestCase
{
    use WithoutMiddleware;
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLihatDaftarKaryawan()
    {
        $user = User::where('level','admin')->first();
        $response = $this->actingAs($user)->get(route('daftar_karyawan'));
        $response->assertStatus(200);
    }
    public function testTambahDaftarKaryawan()
    {
        $user = User::where('level','admin')->first();
            $response = $this->actingAs($user)
                ->post(route('simpan_karyawan' ), [
                    'jabatan_id' => null,
                    'devisi_id' => null,
                    'Tingkat_Pendidikan' => 'S3',
                    'Nama_Karyawan' => $this->faker->name,
                    'Tahun_Lulus' => $this->faker->year,
                    'Nama_Sekolah' =>  $this->faker->word,
                    'Alamat_Karyawan' => $this->faker->address,
                    'Tempat_Lahir' => $this->faker->city,
                    'Tanggal_Lahir' => $this->faker->date,
                    'Agama' => $this->faker->word,
                    'Golongan_Darah' => $this->faker->bloodType,
                    'Status_Pernikahan' => $this->faker->word,
                    'Jumlah_Anak' => '0',
                    'No_Hp' => '111111111111',
                    'Mulai_Kerja' => $this->faker->date,
                    'image' => UploadedFile::fake()->image('test1.jpg', 1024),
                    'STATUS' => 'Active',

                ]);
                $this->withoutExceptionHandling();
            // dd($response);
             $response->assertStatus(302);
    }
    // public function testEditDaftarKaryawan()
    // {
    //     $user = User::where('level','admin')->first();
    //     $response = $this->actingAs($user)
    //         ->put(route('update_karyawan', '11'), [
    //             'jabatan_id' => '1',
    //             'devisi_id' => '1',
    //             'pendidikan_id' => '11',
    //             'Alamat_Karyawan' => $this->faker->address,
    //             'Tempat_Lahir' => $this->faker->city,
    //             'Tanggal_Lahir' => $this->faker->date,
    //             'Agama' => $this->faker->word,
    //             'Golongan_Darah' => $this->faker->bloodType,
    //             'Status_Pernikahan' => $this->faker->word,
    //             'Jumlah_Anak' => '0',
    //             'No_Hp' => '111111111111',
    //             'Mulai_Kerja' => $this->faker->date,
    //             'image' => UploadedFile::fake()->image('test1.jpg', 1024),

    //             ]);
    //             $this->withoutExceptionHandling();
    //         // dd($response);
    //          $response->assertStatus(302);
    // }
    // public function testHapusDaftarKaryawan()
    // {
    //     $user = User::where('level','admin')->first();
    //     $response = $this->actingAs($user)->delete(route('delete_karyawan','15'));
    //     $response->assertStatus(302);
    // }
    // public function testLihatDataDiri()
    // {
    //     $user = User::where('level','admin')->first();
    //     $response = $this->actingAs($user)->get(route('data_diri_karyawan'));
    //     $response->assertStatus(200);
    // }
}
