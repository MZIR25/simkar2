<?php

namespace Tests\Feature;

use App\Models\Devisi;
use App\Models\Jabatan;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Auth\Events\Authenticated;

use function PHPUnit\Framework\assertNull;
use function PHPUnit\Framework\assertSame;

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
            ->put(route('update_jabatan', Jabatan::firstOrFail()->jabatan_id), [
                'Nama_Jabatan' =>  $this->faker->jobTitle,
                ]);
                $this->withoutExceptionHandling();
            // dd($response);
             $response->assertStatus(302);
    }
    public function testHapusDaftarJabatan()
    {
        $user = User::where('level','admin')->first();
        $tesDelete = Jabatan::firstOrFail();
        $response = $this->actingAs($user)->delete(route('delete_jabatan', $tesDelete->jabatan_id));
        $response->assertStatus(302);

        assertNull(Jabatan::find($tesDelete->jabatan_id));
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
    $id = Devisi::firstOrFail()->devisi_id;
    $newTitle = $this->faker->jobTitle;

    $response = $this->actingAs($user)
        ->put(route('update_devisi', $id), [
            'Nama_Devisi' =>  $newTitle,
            ]);
            $this->withoutExceptionHandling();

         $response->assertStatus(302);

    assertSame($newTitle, Devisi::find($id)->Nama_Devisi);
}
public function testHapusDaftarDevisi()
{
    $user = User::where('level','admin')->first();
    $id = Devisi::firstOrFail()->devisi_id;
    $response = $this->actingAs($user)->delete(route('delete_devisi',$id));
    $response->assertStatus(302);

    assertNull(Devisi::find($id));
}

}

