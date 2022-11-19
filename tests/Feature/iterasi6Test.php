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


class Iterasi6Test extends TestCase
{

    use WithoutMiddleware;
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLihatDaftarJobdesk()

    {
            $user = User::where('level','admin')->first();
            $response = $this->actingAs($user)
                ->get(route('daftar_jobdesk'));

            $response->assertStatus(200);
    }
    public function testTambahJobdesk()
    {

        $user = User::where('level','admin')->first();
            $response = $this->actingAs($user)
                ->post(route('simpan_jobdesk'), [
                    'karyawan_id' => '1',
                    'Jam_Mulai' => $this->faker->time(),
                    'Jam_Selesai' =>  $this->faker->time(),
                    'Tugas_Karyawan' => $this->faker->word(),
                ]);
                $this->withoutExceptionHandling();
             $response->assertStatus(302);
            //$response->assertSuccessful();
    }
    public function testEditJobdesk()

    {

        $user = User::where('level','admin')->first();
            $response = $this->actingAs($user)
                ->put(route('update_jobdesk', '1'), [
                    'karyawan_id' => '1',
                    'Jam_Mulai' => $this->faker->time(),
                    'Jam_Selesai' =>  $this->faker->time(),
                    'Tugas_Karyawan' => $this->faker->word(),
                ]);
                $this->withoutExceptionHandling();
             $response->assertStatus(302);
            //$response->assertSuccessful();
    }
    public function testHapusJobdesk()
    {
        $user = User::where('level','admin')->first();
        $response = $this->actingAs($user)->delete(route('delete_jobdesk','1'));
        // dd($response);
        $response->assertStatus(302);
    }
}
