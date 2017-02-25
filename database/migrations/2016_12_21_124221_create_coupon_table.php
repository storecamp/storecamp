<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for storing coupons
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_id')->unique();

            $table->string('code')->unique();
            $table->string('name');
            $table->string('description', 1024)->nullable();
            $table->string('sku');
            $table->decimal('value', 20, 2)->nullable();
            $table->decimal('discount', 3, 2)->nullable();
            $table->integer('active')->default(1);
            $table->dateTime('expires_at')->nullable();
            $table->timestamps();
            $table->index(['code', 'expires_at']);
            $table->index(['code', 'active']);
            $table->index(['code', 'active', 'expires_at']);
            $table->index(['sku']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('coupons');
    }
}
