<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class Iteration4Test extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_Lihat_presensi()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_presensi_masuk()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_presensi_keluar()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_unggah_laporan_presensi()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_edit_laporan_presensi()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_hapus_laporan_presensi()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_show_laporan_presensi()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    public function test_lihat_riwayat_presensi()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
