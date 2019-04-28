<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LikeRelasiArtikel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('like_artikel', function(Blueprint $table){
            $table->foreign('id_artikel')->references('id_artikel')->on('artikel')
                  ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('id_data_user')->references('id_data_user')->on('data_user')
            ->onUpdate('cascade')->onDelete('cascade');
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
