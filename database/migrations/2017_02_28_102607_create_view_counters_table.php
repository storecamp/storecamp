<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateViewCountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('counter', function ($table) {
            $table->string('unique_id', 36)->unique();
            $table->increments('id');
            $table->string('class_name');
            $table->integer('object_id');
            $table->integer('view_counter')->unsigned()->default(0);
            $table->index('class_name');
            $table->index('object_id');
            $table->timestamps();
        });
        Schema::create('user_counter', function ($table) {
            $table->string('unique_id', 36)->unique();
            $table->increments('id');
            $table->string('class_name');
            $table->integer('object_id');
            $table->integer('user_id');
            $table->string('action');
            $table->timestamps();
            $table->index('class_name');
            $table->index('object_id');
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('counter');
        Schema::drop('user_counter');
    }
}
