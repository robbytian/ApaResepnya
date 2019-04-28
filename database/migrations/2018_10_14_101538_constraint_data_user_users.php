<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConstraintDataUserUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('data_user', function(Blueprint $table){
            $table->string('username',25)->nullable()->after('foto');
            $table->foreign('username')->references('username')->on('users')
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
            $table->dropColumnifExists('username');
        });
    }
}
