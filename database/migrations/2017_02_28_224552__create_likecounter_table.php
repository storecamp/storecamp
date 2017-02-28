<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLikeCounterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes_counter', function (Blueprint $table) {
            $table->increments('id');
            $table->morphs('likeable');
            $table->string('unique_id', 36)->unique();

            $table->integer('count')->unsigned()->default(0);
            $table->timestamps();

            $table->unique([
                'likeable_id', 'likeable_type',
            ], 'likeable_counts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes_counter');
    }
}
