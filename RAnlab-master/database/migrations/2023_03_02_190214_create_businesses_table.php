<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('last_action');
            $table->string('region', 255);
            $table->integer('year');
            $table->string('industry');
            $table->string('name');
            $table->integer('employment');
            $table->string('location');
            $table->string('latitude');
            $table->string('longitude');
            $table->boolean('is_master')->default(true);
            $table->foreignId('master_id')->nullable();
            $table->boolean('is_draft')->default(false);
            $table->foreignId('review_id')->nullable();
            $table->foreignId('created_by_id')->default(1);
            $table->foreignId('updated_by_id')->default(1);
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
        Schema::dropIfExists('businesses');
    }
};
