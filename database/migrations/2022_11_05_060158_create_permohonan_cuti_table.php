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
        Schema::create('permohonan_cuti', function (Blueprint $table) {
            $table->increments('cuti_id');
            $table->integer('karyawan_id')->unsigned()->nullable();
            $table->foreign('karyawan_id')->references('karyawan_id')->on('karyawan')->cascadeOnDelete('cascade');
            $table->string('Alasan_Cuti')->nullable();
            $table->string('Status')->nullable();
            $table->string('Keterangan_Status')->nullable();
            $table->date('Tanggal_Mulai')->nullable();
            $table->date('Tanggal_Selesai')->nullable();


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
        Schema::dropIfExists('permohonan_cuti');
    }
};
