<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->dateTime('date_of_birth');
            $table->dateTime('date_of_death');
            $table->string('funeral');
            $table->dateTime('start_of_campaign');
            $table->dateTime('end_of_campaign');
            $table->string('street');
            $table->string('city');
            $table->string('province');
            $table->string('postal_code');
            $table->string('story');
            $table->string('is_draft');
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
        Schema::dropIfExists('campaigns');
    }
}
