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

class Iterasi8Test extends TestCase
{
    use WithoutMiddleware;
    use WithFaker;

    public function testLihatDaftarJabatan()
        {
            $user = User::where('level','admin')->first();
                $response = $this->actingAs($user)
                    ->get(route('daftar_jabatan'));
                $response->assertStatus(200);
        }
        public function testTambahDaftarJabatan()
    {
        $user = User::where('level','admin')->first();
            $response = $this->actingAs($user)
                ->post(route('simpan_jabatan' ), [
                    'Nama_Jabatan' =>  $this->faker->jobTitle,
                ]);
                $this->withoutExceptionHandling();
            // dd($response);
             $response->assertStatus(302);
    }
    public function testEditDaftarJabatan()
    {
        $user = User::where('level','admin')->first();
        $response = $this->actingAs($user)
            ->put(route('update_jabatan', '7'), [
                'Nama_Jabatan' =>  $this->faker->jobTitle,
                ]);
                $this->withoutExceptionHandling();
            // dd($response);
             $response->assertStatus(302);
    }
    public function testHapusDaftarJabatan()
    {
        $user = User::where('level','admin')->first();
        $response = $this->actingAs($user)->delete(route('delete_jabatan','12'));
        $response->assertStatus(302);
    }

    public function testLihatDaftarDevisi()
    {
        $user = User::where('level','admin')->first();
            $response = $this->actingAs($user)
                ->get(route('daftar_jabatan'));
            $response->assertStatus(200);
    }
    public function testTambahDaftarDevisi()
{
    $user = User::where('level','admin')->first();
        $response = $this->actingAs($user)
            ->post(route('simpan_devisi' ), [
                'Nama_Devisi' =>  $this->faker->jobTitle,
            ]);
            $this->withoutExceptionHandling();
        // dd($response);
         $response->assertStatus(302);
}
public function testEditDaftarDevisi()
{
    $user = User::where('level','admin')->first();
    $response = $this->actingAs($user)
        ->put(route('update_devisi', '5'), [
            'Nama_Devisi' =>  $this->faker->jobTitle,
            ]);
            $this->withoutExceptionHandling();
        // dd($response);
         $response->assertStatus(302);
}
public function testHapusDaftarDevisi()
{
    $user = User::where('level','admin')->first();
    $response = $this->actingAs($user)->delete(route('delete_devisi','7'));
    $response->assertStatus(302);
}

}

