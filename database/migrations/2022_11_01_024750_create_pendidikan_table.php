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
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->increments('pendidikan_id');
            // $table->integer('karyawan_id')->unsigned();
            // $table->foreign('karyawan_id')->references('karyawan_id')->on('Karyawan')->onDelete('cascade');
            $table->string('Tingkat_Pendidikan')->nullable();
            $table->year('Tahun_Lulus')->nullable();
            $table->string('Nama_Sekolah')->nullable();
            $table->string('No_Ijazah')->nullable();
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
        Schema::dropIfExists('pendidikan');
    }
};
