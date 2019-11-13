<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('volunteer_id');
            $table->unsignedBigInteger('organization_id');
            $table->unsignedBigInteger('event_id');
            $table->text('text');
            $table->tinyInteger('owner_type'); // 0 - volunteer 1 - organization
            $table->timestamps();


            $table->foreign('volunteer_id')->references('id')->on('volunteers');
            $table->foreign('organization_id')->references('id')->on('organizations');
            $table->foreign('event_id')->references('id')->on('events');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
