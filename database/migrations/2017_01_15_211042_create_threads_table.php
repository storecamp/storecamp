<?php

use Illuminate\Support\Facades\Schema;
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
            $table->string('subject')->default('review');
            $table->integer('commentable_id')->unsigned();
            $table->string('commentable_type');
            $table->integer('parent_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->index(['commentable_id', 'id']);
            $table->index(['commentable_id', 'commentable_type']);
            $table->index(['commentable_id', 'id', 'commentable_type']);
            $table->index(['commentable_id', 'parent_id']);
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
        });
    }
}
