<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LogAktivitas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_aktivitas', function (Blueprint $table) {
            $table->increments('id_log');
            $table->string('aktivitas',20);
            $table->integer('id_data_user')->nullable()->unsigned();
            $table->integer('id_artikel')->nullable()->unsigned();
            $table->integer('id_tutorial')->nullable()->unsigned();
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
