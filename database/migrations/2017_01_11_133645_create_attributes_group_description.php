<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesGroupDescription extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes_group_description', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('unique_id')->unique();

            $table->integer('attributes_group_id')->unsigned();
            $table->foreign('attributes_group_id')->references('id')->on('attributes_group')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->tinyInteger('sort_order')->default(0);
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
        Schema::drop('attributes_group_description', function (Blueprint $table) {
            $table->dropForeign('attributes_group_description_attributes_group_id_foreign');
            $table->dropSoftDeletes();
        });

    }
}
