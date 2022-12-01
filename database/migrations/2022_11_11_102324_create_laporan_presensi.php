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
        Schema::create('laporan_presensi', function (Blueprint $table) {
            $table->increments('laporan_presensi_id');
            $table->integer('presensi_id')->unsigned()->nullable();
            $table->foreign('presensi_id')->references('presensi_id')->on('presensi')->onDelete('cascade');
            $table->time("jam_mulai");
            $table->time("jam_selesai");
            $table->string("uraian_pekerjaan");
            $table->string("output_pekerjaan");
            $table->string("file");
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
        //
    }
};
