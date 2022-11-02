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

class Iterasi1Test extends TestCase
{
    use RefreshDatabase;
    use WithoutMiddleware;

    public function testLoginRegisterLogout()
    {
        $user = User::factory()->create([
            'name' => 'karyawan',
            'email' => 'karyawan2@gmail.com',
            'password' => bcrypt($password = 'i-love-laravel'),
        ]);
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,
        ]);
        $this->assertAuthenticatedAs($user);
        $this->get('/logout');

    }

}
