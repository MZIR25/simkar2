<?php

namespace Tests\Feature;

use App\Models\Cuti;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\User;
use Database\Factories\CutiFactory;
use Database\Factories\KaryawanFactory;
use Database\Factories\UserFactory;

// class Iterasi3Test extends TestCase
// {

//     use WithoutMiddleware;
//     use WithFaker;

//     /**
//      * A basic feature test example.
//      *
//      * @return void
//      */
//     public function testLihatDaftarCuti()

//     {
//         $user = User::where('level', 'admin')->first();
//         $response = $this->actingAs($user)
//             ->get(route('permohonan_cuti'));

//         $response->assertStatus(200);
//     }
//     public function testTambahPermohonanCuti()
//     {
//         $user = User::where('level', 'admin')->first();
//         $karyawan = KaryawanFactory::new()->createOne();

//         $response = $this->actingAs($user)
//             ->post(route('simpan_cuti'), [
//                 'karyawan_id' => $karyawan->karyawan_id,
//                 'Alasan_Cuti' => 'pulang kampung',
//                 'Tanggal_Mulai' =>  $this->faker->date,
//                 'Tanggal_Selesai' => $this->faker->date,
//             ]);

//         $this->withoutExceptionHandling();
//         $this->assertSame(1, Cuti::where('karyawan_id', $karyawan->karyawan_id)->count());
//         $response->assertStatus(302);
//     }
//     public function testEditPermohonanCuti()
//     {
//         $cuti = CutiFactory::new()->createOne();
//         $user = User::where('level', 'admin')->first();

//         $response = $this->actingAs($user)
//             ->put(route('update_cuti', $cuti->cuti_id), [
//                 'Nama_Karyawan' => 'Richard Chandra Tjiang',
//                 'Alasan_Cuti' => 'Keluar kota',
//                 'Tanggal_Mulai' =>  $this->faker->date,
//                 'Tanggal_Selesai' => $this->faker->date,

//             ]);
//         $this->withoutExceptionHandling();
//         $response->assertStatus(302);
//     }
//     public function test_HapusPermohonanCuti()
//     {
//         $user = UserFactory::new()->for(KaryawanFactory::new())->createOne();
//         $cuti = CutiFactory::new()->for($user->karyawan)->createOne();
//         $response = $this->actingAs($user)->delete(route('delete_cuti', $cuti->cuti_id));
//         $response->assertStatus(302);
//     }
// }
