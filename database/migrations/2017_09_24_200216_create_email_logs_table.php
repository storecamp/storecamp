<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailLogsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('email_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_id', 36)->unique();
            $table->string('message_id')->index()->nullable();
            $table->string('from', 80);
            $table->string('from_name', 80)->nullable();
            $table->string('reply_to', 40)->nullable();
            $table->string('subject');
            $table->text('text')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->text('delay_time')->nullable();
            $table->boolean('is_drafted')->default(false);
            $table->text('html')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::drop('email_logs');
    }
}
