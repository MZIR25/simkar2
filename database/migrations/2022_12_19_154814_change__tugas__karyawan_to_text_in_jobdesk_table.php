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
        Schema::table('jobdesk', function (Blueprint $table) {
            $table->text("Tugas_Karyawan")->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('text_in_jobdesk', function (Blueprint $table) {
            $table->string("Tugas_Karyawan")->nullable()->change();
        });
    }
};
