<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
            $table->string('unique_id')->unique();
            $table->string('title');
            $table->text('body');
            $table->decimal('tax', 20, 2)->default(0);
            $table->char('model')->nullable();
            $table->string('slug')->nullable();
            $table->string('stock_status')->nullable();
            $table->integer('viewed')->default(0);
            $table->integer('quantity')->default(0);
            $table->char('sku', 64)->nullable();
            $table->char('upc', 12)->nullable();
            $table->char('ean', 14)->nullable();
            $table->char('jan', 13)->nullable();
            $table->char('isbn', 17)->nullable();
            $table->char('mpn', 64)->nullable();
            $table->decimal('price', 20, 2)->default(null);
            $table->decimal('length', 15, 8)->default(0.00000000);
            $table->decimal('width', 15, 8)->default(0.00000000);
            $table->decimal('height', 15, 8)->default(0.00000000);
            $table->decimal('weight', 15, 4)->default(0.0000);
            $table->timestamp('date_available');
            $table->boolean('availability')->default(true);
            $table->string('meta_tag_title')->nullable();
            $table->text('meta_tag_description')->nullable();
            $table->text('meta_tag_keywords')->nullable();
            $table->tinyInteger('sort_order')->default(0);
            $table->timestamps();
            $table->index(['unique_id']);
            $table->index(['slug']);
            $table->index(['unique_id', 'price']);
            $table->index(['unique_id', 'viewed']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
