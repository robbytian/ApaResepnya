<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConstraintLikeTutorial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('like_tutorial', function(Blueprint $table){
            $table->integer('id_tutorial')->nullable()->unsigned()->after('jumlah_like');
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
        Schema::table('like_tutorial', function ($table) {
            $table->dropColumnifExists('id_tutorial');
        });
    }
}
