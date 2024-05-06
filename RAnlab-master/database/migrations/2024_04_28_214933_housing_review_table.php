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
        Schema::create('housing_review', function (Blueprint $table) {
            $table->id();
            $table->string('CSDID');
            $table->string('CSDTxt');
            $table->string('year');
            $table->string('number_Of_bedrooms');
            $table->string('house_structure');
            $table->string('location');
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
        Schema::dropIfExists('housing_review');
    }
};
