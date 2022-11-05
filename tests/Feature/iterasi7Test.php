<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\User;
use Illuminate\Auth\Events\Authenticated;

// class iterasi7Test extends TestCase
// {
//     /**
//      * A basic feature test example.
//      *
//      * @return void
//      */

//     use RefreshDatabase;
//         use WithoutMiddleware;
//         use WithFaker;
//     // public function testLihatDaftarRiwayat()
//     // {
//     //             // $user = User::factory()->create([
//     //             //     'name' => 'karyawan',
//     //             //     'email' => 'karyawan2@gmail.com',
//     //             //     'password' => bcrypt($password = 'i-love-laravel'),
//     //             // ]);
//     //             // $response = $this->post('/login', [
//     //             //     'email' => $user->email,
//     //             //     'password' => $password,
//     //             //     'level' => 'admin'
//     //             // ]);
//     //             // $this->assertAuthenticatedAs($user);
//     //             $user = User::factory()->create();
//     //             $user = User::where('level','admin')->first();
//     //                 $response = $this->actingAs($user)
//     //                     ->get(route('riwayat'));

//     //                 $response->assertStatus(200);
//     // }
//     // public function testLihatDaftarUser()
//     // {
//     //     $user = User::factory()->create();
//     //     $user = User::where('level','admin')->first();
//     //                 $response = $this->actingAs($user)
//     //                     ->get(route('manajemen_user'));

//     //                 $response->assertStatus(200);
//     // }
//     // public function testEditUser()
//     // {
//     //     $user = User::factory()->create;

//     //     $user = User::where('level','admin')->first();
//     //     $response = $this->actingAs($user)
//     //         ->put(route('update_user', '1'), [
//     //             'name' => $this->faker->name,
//     //             'email' => $this->faker->email,
//     //             'level' => 'admin',

//     //         ]);
//     //         $response->assertStatus(200);
//     // }

// // }
