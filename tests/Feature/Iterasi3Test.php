<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\User;
use Illuminate\Auth\Events\Authenticated;


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

//         $user = User::where('level','admin')->first();
//             $response = $this->actingAs($user)
//                 ->get(route('permohonan_cuti'));

//             $response->assertStatus(200);
//     }
//     public function testTambahPermohonanCuti()
//     {
//         $user = User::where('level','admin')->first();
//             $response = $this->actingAs($user)
//                 ->post(route('simpan_cuti' ), [
//                     'karyawan_id' => '1',
//                     'Alasan_Cuti' => 'pulang kampung',
//                     'Tanggal_Mulai' =>  $this->faker->date,
//                     'Tanggal_Selesai' => $this->faker->date,

//                 ]);
//                 $this->withoutExceptionHandling();
//             // dd($response);
//              $response->assertStatus(302);
//     }
//     public function testEditPermohonanCuti()
//     {
//         $user = User::where('level','admin')->first();
//         $response = $this->actingAs($user)
//             ->put(route('update_cuti', '2'), [
//                     'Nama_Karyawan' => 'Richard Chandra Tjiang',
//                     'Alasan_Cuti' => 'Keluar kota',
//                     'Tanggal_Mulai' =>  $this->faker->date,
//                     'Tanggal_Selesai' => $this->faker->date,

//                 ]);
//                 $this->withoutExceptionHandling();
//             // dd($response);
//              $response->assertStatus(302);
//     }
//     public function test_hapus_user()
//     {
//         $user = User::where('level','admin')->first();
//         $response = $this->actingAs($user)->delete(route('delete_cuti','4'));
//         $response->assertStatus(302);
//     }
// }
