<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConstraintBahan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bahan_tutorial', function(Blueprint $table){
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
        Schema::table('bahan_tutorial', function ($table) {
           
        });
    }
}
