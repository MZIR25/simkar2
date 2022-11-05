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
//     use RefreshDatabase;
//     use WithoutMiddleware;
//     use WithFaker;

//     /**
//      * A basic feature test example.
//      *
//      * @return void
//      */
//     // public function testLihatDaftarCuti()

//     // {
//     //     $user = User::factory()->create();
//     //     $user = User::where('level','admin')->first();
//     //         $response = $this->actingAs($user)
//     //             ->get(route('permohonan_cuti', [ 'user' => 'admin', ]));

//     //         $response->assertStatus(200);
//     // }
//     // public function test_tambah_user_()
//     // {
//     //     $user = User::factory()->create();
//     //     $user = User::where('level','admin')->first();
//     //         $response = $this->actingAs($user)
//     //             ->post(route('user.store'), [
//     //                 'Nama' => $this->faker->name(),
//     //                 'Email' => 'admin@gmail.com',
//     //                 'Kontak' =>  $this->faker->phoneNumber(),
//     //                 'Alamat' => $this->faker->address(),
//     //                 'Role' => 'Admin',
//     //                 'Jabatan' => $this->faker->jobTitle,
//     //                 'Password' => 'asdfghjklkjh',


//     //             ]);
//     //             $this->withoutExceptionHandling();
//     //          $response->assertStatus(302);
//     //         //$response->assertSuccessful();
//     // }
// // }
