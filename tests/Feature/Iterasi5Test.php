<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Karyawan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\User;
use Illuminate\Auth\Events\Authenticated;


// class Iterasi5Test extends TestCase
// {

//     use WithoutMiddleware;
//     use WithFaker;

//     /**
//      * A basic feature test example.
//      *
//      * @return void
//      */
//     public function testLihatDaftarGaji()

//     {
//             $user = User::where('level','admin')->first();
//             $response = $this->actingAs($user)
//                 ->get(route('daftar_gaji'));

//             $response->assertStatus(200);
//     }
//     public function testTambahGaji()
//     {

//         $user = User::where('level','admin')->first();
//             $response = $this->actingAs($user)
//                 ->post(route('simpan_gaji'), [
//                     'karyawan_id' => '1',
//                     'Gaji_Pokok' => 'Rp.10.000.000.00',
//                     'Pajak_Bpjs' =>  'Rp.100.000.00',
//                     'Jumlah_Gaji' => 'Rp.9.000.000.00',
//                 ]);
//                 $this->withoutExceptionHandling();
//              $response->assertStatus(302);
//             //$response->assertSuccessful();
//     }
//     public function testEditGaji()

//     {

//         $user = User::where('level','admin')->first();
//             $response = $this->actingAs($user)
//                 ->put(route('update_gaji', '4'), [
//                     'karyawan_id' => '1',
//                     'Gaji_Pokok' => 'Rp.11.000.000.00',
//                     'Pajak_Bpjs' =>  'Rp.100.000.00',
//                     'Jumlah_Gaji' => 'Rp.10.000.000.00',
//                 ]);
//                 $this->withoutExceptionHandling();
//              $response->assertStatus(302);
//             //$response->assertSuccessful();
//     }
//     public function testHapusGaji()
//     {
//         $user = User::where('level','admin')->first();
//         $response = $this->actingAs($user)->delete(route('delete_gaji','3'));
//         // dd($response);
//         $response->assertStatus(302);
//     }
// }
