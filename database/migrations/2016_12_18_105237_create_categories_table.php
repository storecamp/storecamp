<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_id')->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image_link')->nullable();
            $table->string('slug')->nullable();
            $table->string('meta_tag_title')->nullable();
            $table->text('meta_tag_description')->nullable();
            $table->text('meta_tag_keywords')->nullable();
            $table->boolean('status')->default(true);
            $table->boolean('top')->default(false);
            $table->tinyInteger('sort_order')->default(0);
            \App\Core\Support\Nestedset\NestedSet::columns($table);
            $table->timestamps();
            $table->unique(['parent_id', 'unique_id', 'id', 'name']);
            $table->index(['parent_id','unique_id']);
            $table->index(['unique_id', 'slug']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories', function(Blueprint $t) {
            \App\Core\Support\Nestedset\NestedSet::dropColumns($t);
        });
    }
}
