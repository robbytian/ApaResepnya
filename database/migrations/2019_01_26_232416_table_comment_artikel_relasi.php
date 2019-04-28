<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TableCommentArtikelRelasi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('comment_artikel', function(Blueprint $table){
            $table->foreign('id_data_user')->references('id_data_user')->on('data_user')
                  ->onDelete('cascade')->onUpdate('cascade'); // neither of them works
                  $table->foreign('id_artikel')->references('id_artikel')->on('artikel')
                  ->onDelete('cascade')->onUpdate('cascade'); // neither of them works
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
