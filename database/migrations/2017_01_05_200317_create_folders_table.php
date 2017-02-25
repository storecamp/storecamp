<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('folders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_id')->unique();

            $table->integer('parent_id')->nullable()->default(1);
            $table->string('name')->nullable();
            $table->string('disk')->nullable();
            $table->string('path_on_disk')->nullable();
            $table->string('slug')->nullable();
            $table->boolean('locked')->default(false);
            $table->tinyInteger('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('folders');
    }
}
