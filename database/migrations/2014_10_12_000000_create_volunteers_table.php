<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('is_admin')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('posy')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('terms_accepted_at')->nullable();
            $table->string('password');
            $table->string('mobile')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->char('sex')->nullable();
            $table->boolean('driving_licence')->nullable();
            $table->date('birth')->nullable();
            $table->string('works_at')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('volunteers');
    }
}
