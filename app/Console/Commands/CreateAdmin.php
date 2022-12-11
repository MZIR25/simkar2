<?php

namespace App\Console\Commands;

use App\Models\Devisi;
use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Console\Command;

class CreateAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        User::firstOrCreate([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'level' => 'admin',
        ], [
            'password' => Hash::make('12345678'),
        ]);

        // $karyawan = Karyawan::firstOrCreate([
        //     'jabatan_id' => Jabatan::firstOrFail()->jabatan_id,
        //     'devisi_id' => Devisi::firstOrFail()->devisi_id,
        //     'Nama_Karyawan' => 'karyawan'
        // ]);
        // User::firstOrCreate([
        //     'name' => 'karyawan',
        //     'email' => 'karyawan@admin.com',
        //     'level' => 'karyawan',
        // ], [
        //     'password' => Hash::make('12345678'),
        //     'karyawan_id' => $karyawan->karyawan_id
        // ]);
        // User::firstOrCreate([
        //     'name' => 'non-admin',
        //     'email' => 'non-admin@admin.com',
        // ], [
        //     'password' => Hash::make('12345678'),
        // ]);
        return Command::SUCCESS;
    }
}
