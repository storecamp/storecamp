<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('threads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject');
            $table->integer('review_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('review_id')->references('id')->on('product_reviews')->onUpdate('cascade')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('threads', function(Blueprint $table) {
            $table->dropSoftDeletes();
            $table->dropForeign('threads_review_id_foreign');
        });
    }
}
