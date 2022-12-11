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
use Database\Factories\GajiFactory;
use Illuminate\Auth\Events\Authenticated;


class Iterasi5Test extends TestCase
{

    use WithoutMiddleware;
    use WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLihatDaftarGaji()

    {
        $user = User::where('level', 'admin')->first();
        $response = $this->actingAs($user)
            ->get(route('daftar_gaji'));

        $response->assertStatus(200);
    }

    public function testTambahGaji()
    {
        $user = User::where('level', 'admin')->first();
        $response = $this->actingAs($user)
            ->post(route('simpan_gaji'), [
                'karyawan_id' => '1',
                'Gaji_Pokok' => '10_000_000',
                'Pajak_Bpjs' =>  '100_000',
                'Jumlah_Gaji' => '9_000_000',
            ]);

        $this->withoutExceptionHandling();
        $response->assertStatus(302);
    }

    public function testEditGaji()
    {
        $user = User::where('level', 'admin')->first();
        $gaji = GajiFactory::new()->createOne();

        $response = $this->actingAs($user)
            ->put(route('update_gaji', $gaji->gaji_id), [
                'karyawan_id' => '1',
                'Gaji_Pokok' => '11_000_000',
                'Pajak_Bpjs' =>  '100_000',
                'Jumlah_Gaji' => '10_000_000',
            ]);

        $this->withoutExceptionHandling();
        $response->assertStatus(302);
    }

    public function testHapusGaji()
    {
        $user = User::where('level', 'admin')->first();
        $gaji = GajiFactory::new()->createOne();
        $response = $this->actingAs($user)->delete(route('delete_gaji', $gaji->gaji_id));
        $response->assertStatus(302);

        $this->assertNull($gaji->fresh());
    }
}
