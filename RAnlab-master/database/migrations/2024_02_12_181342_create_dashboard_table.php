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
            $table->integer('Private_dwellings_occupied_by_usual_residents')->default(0);
            $table->integer('Private_dwellings_not_occupied_by_usual_residents')->default(0);
            $table->integer('Total_private_dwellings')->default(0);
            $table->integer('Age_distribution_0_to_14')->default(0);
            $table->integer('Age_distribution_15_to_64')->default(0);
            $table->integer('Age_distribution_65_years_and_over')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dashboard');
    }
}

