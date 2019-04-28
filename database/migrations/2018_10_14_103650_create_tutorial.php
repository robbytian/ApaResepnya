<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTutorial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tutorial', function (Blueprint $table) {
            $table->increments('id_tutorial');
            $table->string('judul',30);
            $table->text('bahan');
            $table->text('langkah');
            $table->string('gambar_header',50)->nullable();
            $table->string('video_header',50)->nullable();
            $table->string('foto_langkah')->nullable();
            $table->text('deskripsi');
            $table->string('porsi',3);
            $table->string('waktu_masak',10);
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
        Schema::dropIfExists('tutorial');
    }
}
