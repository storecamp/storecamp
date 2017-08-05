<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParserTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parsers', function(Blueprint $table) {
            $table->increments('id');
            $table->string('unique_id', 36)->unique();

            $table->string('name');
            $table->string('image')->nullable();
            $table->string('url');
            $table->string('search_query')->nullable();
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
		Schema::drop('parsers');
	}

}
