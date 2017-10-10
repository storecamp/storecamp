<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailLogRecepientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_log_recipients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('unique_id', 36)->unique();
            $table->integer('email_log_id')->unsigned();
            $table->foreign('email_log_id')->references('id')->on('email_logs');
            $table->string('email', 80);
            $table->string('name', 80)->nullable();
            $table->string('type', 10); //to, cc, bcc
            $table->string('status', 30)->default(0);
            $table->string('status_desc')->nullable();
            $table->string('timestamp', 12)->nullable();
            $table->text('user_agent')->nullable();
            $table->smallInteger('open_count')->default(0);
            $table->smallInteger('click_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('email_log_recipients');
    }
}
