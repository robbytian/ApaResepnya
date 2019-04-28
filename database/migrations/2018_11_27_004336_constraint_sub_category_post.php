<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ConstraintSubCategoryPost extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sub_category_post', function(Blueprint $table){
            $table->foreign('id_category')->references('id_category')->on('category')
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
