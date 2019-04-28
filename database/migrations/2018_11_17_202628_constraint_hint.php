<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConstraintHint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_user', function($table){
            $table->foreign('id_hint')
                  ->references('id_hint')->on('hint')
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
        Schema::table('data_user', function ($table) {
            $table->dropColumnifExists('id_hint');
        });
    }
}
