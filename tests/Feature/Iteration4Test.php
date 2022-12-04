<?php

namespace Tests\Feature;

use App\Models\LaporanPresensi;
use App\Models\Presensi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\assertNull;
use function PHPUnit\Framework\assertSame;

class Iteration4Test extends TestCase
{
    use WithFaker;

    function set_now($id)
    {
        $last = Presensi::where('karyawan_id', $id)->orderByDesc("tgl_presensi")->first();
        if ($last != null) {
            Carbon::setTestNow(Carbon::parse($last->tgl_presensi)->addDay(1));
        }
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_Lihat_presensi()
    {
        $user = User::where('level', 'karyawan')->first();
        $response = $this->actingAs($user)->get(route("presensi"));
        $response->assertStatus(200);
    }

    public function test_presensi_masuk()
    {
       DB::transaction(function () {
            $user = User::where('level', 'karyawan')->first();

            Carbon::setTestNow(Carbon::create(null, null, null, 8, 0));

            $ids = Presensi::all()->all('id');


            $response = $this->actingAs($user)->post("/presensi");

            $presensi = Presensi::whereNotIn('presensi_id', $ids)->firstOrFail();
            assertSame("tepat waktu", $presensi->keterangan);
            $presensi->delete();

            Carbon::setTestNow(Carbon::create(null, null, null, 8, 1, 0));

            $response = $this->actingAs($user)->post('/presensi', []);

            $presensi = Presensi::whereNotIn("presensi_id", $ids)->firstOrFail();
            assertSame("terlambat", $presensi->keterangan);
            $presensi->delete();

            $response->assertStatus(302);
        });
    }
    public function test_presensi_keluar()
    {
       DB::transaction(function () {
            $user = User::where('level', 'karyawan')->first();

            Carbon::setTestNow(Carbon::create(null, null, null, 8, 0));
            $jamMasuk = Carbon::now()->format("H:i:s");

            $response = $this->actingAs($user)->post("/presensi");

            $ids = Presensi::all()->all();

            $presensi = Presensi::whereNotIn("presensi_id", $ids)->first();
            $response->assertStatus(302);
            assertSame($jamMasuk, $presensi->jam_masuk);

            Carbon::setTestNow(Carbon::create(null, null, null, 18, 0));
            $jamKeluar = Carbon::now()->format("H:i:s");

            $response = $this->actingAs($user)->post("/presensi", ['status' => 'pulang']);
            $presensi = Presensi::find($presensi->presensi_id);
            assertSame($jamMasuk, $presensi->jam_masuk);
            assertSame($jamKeluar, $presensi->jam_keluar);

            $presensi->delete();

            $response->assertStatus(302);
        });
    }
    public function test_unggah_laporan_presensi()
    {
       DB::transaction(function () {
            $user = User::where('level', 'karyawan')->first();
            $presensi_ids = Presensi::all()->all();

            $ids = LaporanPresensi::all()->all();


            $data = [

                'jam_mulai' => Carbon::now()->format("H:i:s"),
                'jam_selesai' => Carbon::now()->format("H:i:s"),
                'uraian_pekerjaan' => $this->faker->words(10, true),
                'output_pekerjaan' => $this->faker->words(10, true),
                'file' => UploadedFile::fake()->create("test")
            ];

            $response = $this->actingAs($user)->post(route("create_laporan_presensi"), $data);
            $response->assertStatus(302);

            $laporan = LaporanPresensi::whereNotIn("laporan_presensi_id", $ids)->first();

            assertSame($data['jam_mulai'], $laporan->jam_mulai);
            assertSame($data['jam_selesai'], $laporan->jam_selesai);
            assertSame($data['uraian_pekerjaan'], $laporan->uraian_pekerjaan);
            assertSame($data['output_pekerjaan'], $laporan->output_pekerjaan);

            $laporan->delete();
            Presensi::whereNotIn("presensi_id", $presensi_ids)->delete();
        });

    }
    public function test_edit_laporan_presensi()
    {
       DB::transaction(function () {
            $user = User::where('level', 'karyawan')->first();
            $presensi_ids = Presensi::all()->all();

            $ids = LaporanPresensi::all()->all();

            $oldData = [
                'jam_mulai' => Carbon::now()->format("H:i:s"),
                'jam_selesai' => Carbon::now()->format("H:i:s"),
                'uraian_pekerjaan' => $this->faker->words(10, true),
                'output_pekerjaan' => $this->faker->words(10, true),
                'file' => UploadedFile::fake()->create("test")
            ];

            $response = $this->actingAs($user)->post(route("create_laporan_presensi"), $oldData);
            $response->assertstatus(302);

            $laporan = LaporanPresensi::whereNotIn("laporan_presensi_id", $ids)->first();

            Carbon::setTestNow(Carbon::now()->addMinutes(10));
            $data = [
                'jam_mulai' => Carbon::now()->format("H:i:s"),
                'jam_selesai' => Carbon::now()->format("H:i:s"),
                'uraian_pekerjaan' => $this->faker->words(10, true),
                'output_pekerjaan' => $this->faker->words(10, true),
            ];
            $laporan = LaporanPresensi::whereNotIn("laporan_presensi_id", $ids)->first();
            $response = $this->actingAs($user)->put(route("update_laporan_presensi", $laporan->laporan_presensi_id), $data);
            $response->assertStatus(302);

            $laporan = LaporanPresensi::whereNotIn("laporan_presensi_id", $ids)->first();

            assertSame($data['jam_mulai'], $laporan->jam_mulai);
            assertSame($data['jam_selesai'], $laporan->jam_selesai);
            assertSame($data['uraian_pekerjaan'], $laporan->uraian_pekerjaan);
            assertSame($data['output_pekerjaan'], $laporan->output_pekerjaan);

            $laporan->delete();
            Presensi::whereNotIn("presensi_id", $presensi_ids)->delete();
        });
    }
    public function test_hapus_laporan_presensi()
    {
       DB::transaction(function () {
            $user = User::where('level', 'karyawan')->first();
            $presensi_ids = Presensi::all()->all();

            $ids = LaporanPresensi::all()->all();

            $oldData = [
                'jam_mulai' => Carbon::now()->format("H:i:s"),
                'jam_selesai' => Carbon::now()->format("H:i:s"),
                'uraian_pekerjaan' => $this->faker->words(10, true),
                'output_pekerjaan' => $this->faker->words(10, true),
                'file' => UploadedFile::fake()->create("test")
            ];

            $response = $this->actingAs($user)->post(route("create_laporan_presensi"), $oldData);
            $response->assertstatus(302);

            $laporan = LaporanPresensi::whereNotIn("laporan_presensi_id", $ids)->first();

            $response = $this->actingAs($user)->delete(route("delete_laporan", $laporan->laporan_presensi_id));
            $response->assertRedirect();

            assertNull(LaporanPresensi::find($laporan->laporan_presensi_id));

            Presensi::whereNotIn("presensi_id", $presensi_ids)->delete();
        });
    }
    public function test_show_laporan_presensi()
    {
        $user = User::where('level', 'karyawan')->first();
        $response = $this->actingAs($user)->get(route("laporan_presensi"));
        $response->assertStatus(200);
    }
    public function test_lihat_riwayat_presensi()
    {
        $user = User::where('level', 'karyawan')->first();
        $response = $this->actingAs($user)->get(route("riwayat_presensi"));
    }
}
