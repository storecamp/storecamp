<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for storing carts
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('unique_id')->unique();
            $table->integer('user_id')->unsigned();
            $table->string('statusCode', 32);
            $table->timestamps();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('statusCode')
                ->references('code')
                ->on('order_statuses')
                ->onUpdate('cascade');
            $table->index(['user_id', 'statusCode']);
            $table->index(['id', 'user_id', 'statusCode']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
