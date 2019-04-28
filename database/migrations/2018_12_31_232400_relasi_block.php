<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelasiBlock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('block_post', function(Blueprint $table){
            $table->foreign('id_artikel')->references('id_artikel')->on('artikel')
                  ->onDelete('set null')->onUpdate('set null');
                  $table->foreign('id_tutorial')->references('id_tutorial')->on('tutorial')
                  ->onDelete('set null')->onUpdate('set null'); // neither of them works
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
