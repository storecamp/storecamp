<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLikeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_id', 36)->unique();

            $table->morphs('likeable');
            $table->morphs('liked_by');
            $table->timestamps();

            $table->unique([
                'likeable_id', 'likeable_type',
                'liked_by_id', 'liked_by_type',
            ], 'likes_unique');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
    }
}
