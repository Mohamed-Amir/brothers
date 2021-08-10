<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutUsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about_uses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('money_donated')->nullable();
            $table->string('charity_idea')->nullable();
            $table->string('about_us')->nullable();
            $table->string('phone1')->nullable();
            $table->string('phone2')->nullable();
            $table->string('email')->nullable();
            $table->string('vision')->nullable();
            $table->string('volunteers')->nullable();
            $table->string('impacted')->nullable();
            $table->string('positive_feedback')->nullable();
            $table->string('values')->nullable();
            $table->string('address')->nullable();
            $table->string('ceo_speech')->nullable();
            $table->string('initiative')->nullable();
            $table->string('orphans')->nullable();
            $table->string('fraternize')->nullable();
            $table->string('family')->nullable();
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
        Schema::dropIfExists('about_uses');
    }
}
