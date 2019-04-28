<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConstraintTutorial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tutorial', function(Blueprint $table){
            $table->integer('id_category')->nullable()->unsigned()->after('waktu_masak');
            $table->foreign('id_category')->references('id_category')->on('category')
                  ->onDelete('set null')->onUpdate('set null'); // neither of them works

            $table->integer('id_data_user')->nullable()->unsigned()->after('id_category');
            $table->foreign('id_data_user')->references('id_data_user')->on('data_user')
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
        Schema::table('tutorial', function ($table) {
            $table->dropColumnifExists('id_category');
            $table->dropColumnifExists('id_data_user');
    });
}
}
