<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Auth\Events\Authenticated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;
// class ExampleTest extends TestCase
// // {
// //     /**
// //      * A basic test example.
// //      *
// //      * @return void
// //      */
// //     use RefreshDatabase;
// //     use WithoutMiddleware;
// //     // public function test_the_application_returns_a_successful_response()
// //     // {
// //     //     $user = User::factory()->create([
// //     //         'name' => 'karyawan',
// //     //         'email' => 'karyawan2@gmail.com',
// //     //         'password' => bcrypt($password = 'i-love-laravel'),
// //     //     ]);
// //     //     $this->assertTrue(true);

// //     // }
// //     // public function test1()
// //     // {
// //     //     $response = $this->post('/login', [
// //     //         'email' => '11181049@student.itk.ac.id',
// //     //         'password' => '12345678',
// //     //     ]);
// //     //     $response->assertStatus(200);
// //     // }
// //     // public function tes2()
// //     // {

// //     //     $response = $this->post('/login', [
// //     //         'email' => '11181049@student.itk.ac.id',
// //     //         'password' => '12345678',
// //     //     ]);
// //     //     $response->assertStatus(200);
// //     //     $this->get('/logout');
// //     // }
// // }
