<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes_group', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_id')->unique();

            $table->string('name')->unique();
            $table->tinyInteger('sort_order')->default(0);
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('attributes_group', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
