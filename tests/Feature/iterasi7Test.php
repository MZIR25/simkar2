<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Auth\Events\Authenticated;

// class iterasi7Test extends TestCase
// {
//     /**
//      * A basic feature test example.
//      *
//      * @return void
//      */


//     use WithoutMiddleware;
//     use WithFaker;
//     public function testLihatDaftarRiwayat()
//     {
//         $user = User::where('level', 'admin')->first();
//         $response = $this->actingAs($user)
//             ->get(route('riwayat'));

//         $response->assertStatus(200);
//     }
//     public function testLihatDaftarUser()
//     {
//         $user = User::where('level', 'admin')->first();
//         $response = $this->actingAs($user)
//             ->get(route('manajemen_user'));

//         $response->assertStatus(200);
//     }
//     public function testEditUser()
//     {
//         $admin = User::where('level', 'admin')->first();

//         $user = UserFactory::new()->createOne();

        $response = $this->actingAs($admin)
            ->put(route('update_user', $user->id), [
                'name' => $this->faker->name,
                'email' => $this->faker->email,
                'level' => 'admin',
                'karyawan_id' => 2,

//             ]);

//         $response->assertStatus(302);
//     }
// }
