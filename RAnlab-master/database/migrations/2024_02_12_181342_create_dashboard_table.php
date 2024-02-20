<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDashboardTable extends Migration
{
    public function up()
    {
        Schema::create('dashboard', function (Blueprint $table) {
            $table->id();
            $table->string('CSDID');
            $table->string('CSDTxt');
            $table->float('Population_percentage_change_2016_to_2021');
            $table->integer('Population_2016');
            $table->integer('Population_2021');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dashboard');
    }
}

