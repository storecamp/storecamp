<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('unique_id', 36)->unique();

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
