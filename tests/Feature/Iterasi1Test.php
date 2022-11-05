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

    public function testRegisterLoginLogout()
    {
        $user = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt($password = 'admin123'),
            'level' => 'admin'
        ]);
        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => $password,

        ]);

        $this->assertAuthenticatedAs($user)->get('/home');
        $this->get('/logout');
    }

}
