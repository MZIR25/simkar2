<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithFaker;
use Database\Factories\UserFactory;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Contracts\Auth\Authenticatable;
use Tests\TestCase;

class Iterasi1Test extends TestCase
{
    use WithFaker;
    use WithoutMiddleware;


    public function testRegister()
    {
        $user = UserFactory::new()->makeOne();

        $response = $this->post('/register', [
                'name' => $user->name,
                'email' => $user->email,
                'password' => '12345678',
                'password_confirmation' => '12345678'
        ]);

        $this->assertAuthenticated();
    }
    public function testLogin()
    {
        $user = UserFactory::new()->createOne();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => '12345678',

        ]);

        $this->assertAuthenticated();
    }

    public function testLogout()
    {
        $user = UserFactory::new()->createOne();
        $this->actingAs($user);
        $this->assertAuthenticatedAs($user);

        $response = $this->post('/logout');

        $this->assertGuest();
    }

}
