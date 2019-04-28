<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConstraintCommentTutorial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('comment_tutorial', function(Blueprint $table){
            $table->foreign('id_data_user')->references('id_data_user')->on('data_user')
                  ->onDelete('set null')->onUpdate('set null'); // neither of them works
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
        Schema::table('comment_tutorial', function ($table) {
            $table->dropColumnifExists('id_data_user');
            $table->dropColumnifExists('id_tutorial');
    });
}
}
