<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LaporanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_laporan', function (Blueprint $table) {
            $table->increments('id_laporan');
            $table->integer('id_artikel')->nullable()->unsigned();
            $table->integer('id_tutorial')->nullable()->unsigned();
            $table->string('alasan',200);
            $table->string('username',25);
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
}
