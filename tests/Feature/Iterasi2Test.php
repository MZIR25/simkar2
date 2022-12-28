<?php

namespace Tests\Feature;

use App\Models\Karyawan;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use App\Models\User;
use Database\Factories\KaryawanFactory;
use Database\Factories\UserFactory;
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
        $user = User::where('level', 'admin')->first();
        $response = $this->actingAs($user)->get(route('daftar_karyawan'));
        $response->assertStatus(200);
    }
    public function testTambahDaftarKaryawan()
    {

        $user = User::where('level', 'admin')->first();
        $response = $this->actingAs($user)
            ->post(route('simpan_karyawan'), [
                'jabatan_id' => 1,
                'devisi_id' => 1,
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
    public function testEditDaftarKaryawan()
    {
        $karyawan=Karyawan::get('karyawan_id')->first();
        $user = User::where('level', 'admin')->first();
        $response = $this->actingAs($user)
            ->put(route('update_karyawan', '1'), [
                'jabatan_id' => $karyawan->jabatan_id,
                'devisi_id' => $karyawan->devisi_id,
                'pendidikan_id' => '1',
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

            ]);
        $this->withoutExceptionHandling();
        // dd($response);
        $response->assertStatus(302);
    }

    public function testHapusDaftarKaryawan()
    {
        $user = User::where('level', 'admin')->first();
        $karyawan = KaryawanFactory::new()->createOne();
        $response = $this->actingAs($user)->delete(route('delete_karyawan', $karyawan->karyawan_id));

        $this->assertSame("Inactive", $karyawan->fresh()->STATUS);
    }
    public function testLihatDataDiri()
    {
        $user = UserFactory::new()->for(KaryawanFactory::new())->createOne();

        $response = $this->actingAs($user)->get(route('data_diri_karyawan'));
        $response->assertStatus(200);
    }
}
