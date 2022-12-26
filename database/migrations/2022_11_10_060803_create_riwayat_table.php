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
        Schema::create('riwayat', function (Blueprint $table) {
            $table->increments('riwayat_id');
            $table->integer('id')->unsigned()->nullable();
            $table->foreign('id')->references('id')->on('users')->nullOnDelete('cascade');
            $table->string('nama', 60)->nullable();
            $table->string('level', 10)->nullable();
            $table->string('aktivitas', 100)->nullable();
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
        Schema::dropIfExists('riwayat');
    }
};
