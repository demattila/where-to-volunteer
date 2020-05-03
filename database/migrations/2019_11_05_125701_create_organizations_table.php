<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamp('terms_accepted_at')->nullable();
            $table->string('password');
            $table->text('description')->nullable();
            $table->tinyInteger('type_id')->nullable();
            $table->date('founded_at')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('city')->nullable();
            $table->string('region')->nullable();
            $table->string('address')->nullable();
            $table->string('mobile')->nullable();
            $table->string('site')->nullable();
            $table->unsignedBigInteger('image_id')->nullable();
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
        Schema::dropIfExists('organizations');
    }
}
