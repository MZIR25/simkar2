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
        Schema::create('jobdesk', function (Blueprint $table) {
            $table->increments('jobdesk_id');
            $table->integer('karyawan_id')->unsigned()->nullable();
            $table->foreign('karyawan_id')->references('karyawan_id')->on('karyawan')->nullOnDelete('cascade');
            $table->string('Tugas_Karyawan')->nullable();
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
        Schema::dropIfExists('jobdesk');
    }
};
