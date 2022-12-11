<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_gaji', function (Blueprint $table) {
            $table->increments('gaji_id');
            $table->integer('karyawan_id')->unsigned()->nullable();
            $table->foreign('karyawan_id')->references('karyawan_id')->on('karyawan')->cascadeOnDelete('cascade');
            $table->bigInteger('Gaji_Pokok')->nullable();
            $table->bigInteger('Pajak_Bpjs')->nullable();
            $table->bigInteger('Jumlah_Gaji')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('daftar_gaji');

    }
};
