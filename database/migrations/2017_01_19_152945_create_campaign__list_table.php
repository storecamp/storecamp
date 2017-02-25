<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCampaignListTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_subscribers', function (Blueprint $table) {
            $table->integer('subscriber_id')->unsigned();
            $table->integer('campaign_id')->unsigned();
            $table->foreign('subscriber_id')->references('id')->on('subscribers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('campaign_id')->references('id')->on('campaigns')->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();
            $table->primary(['subscriber_id', 'campaign_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('campaign_subscribers', function(Blueprint $table) {
            $table->dropForeign('campaign_subscribers_subscriber_id_foreign');
            $table->dropForeign('campaign_subscribers_campaign_id_foreign');
        });
    }
}
