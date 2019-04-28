<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConstraintArtikelSubArtikel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('artikel', function(Blueprint $table){
            $table->foreign('id_sub_artikel')->references('id_sub_artikel')->on('sub_artikel')
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
        Schema::table('artikel', function ($table) {
           
        });
    }
}
