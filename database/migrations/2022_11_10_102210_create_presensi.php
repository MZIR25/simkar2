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
        Schema::create('presensi', function (Blueprint $table) {
            $table->increments('presensi_id');
            $table->integer('karyawan_id')->unsigned()->nullable();
            $table->foreign('karyawan_id')->references('karyawan_id')->on('karyawan')->onDelete('cascade');
            $table->time("jam_masuk");
            $table->time("jam_keluar")->nullable();
            $table->date("tgl_presensi");
            $table->string('keterangan');
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
