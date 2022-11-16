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

// class Iterasi1Test extends TestCase
// {
//     use WithFaker;
//     use WithoutMiddleware;


//     public function testRegisterLoginLogout()
//     {

//         $response = $this->post('/login', [
//             'email' => 'admin@gmail.com',
//             'password' => '12345678',

//         ]);

//         // dd($response);
//         $this->assertAuthenticated();


//         // $response = $this->post('/login', [
//         //         'email' => '11181049@student.itk.ac.id',
//         //         'password' => '12345678',
//         // ]);
//         // $this->assertAuthenticated();
//         // // $response->assertRedirect(route('layouts.v_home'));
//         // // $this->get('/logout');
//     }

// }
