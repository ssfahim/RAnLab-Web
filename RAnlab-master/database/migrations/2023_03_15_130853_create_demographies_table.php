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
        Schema::create('demographies', function (Blueprint $table) {
            $table->id();
            $table->string('geog_text')->nullable();
            $table->string('geog_number')->nullable();
            $table->string('geog_text_raw')->nullable();
            $table->bigInteger('population_total')->nullable();
            $table->bigInteger('population_0_4')->nullable();
            $table->bigInteger('population_5_9')->nullable();
            $table->bigInteger('population_10_14')->nullable();
            $table->bigInteger('population_15_19')->nullable();
            $table->bigInteger('population_20_24')->nullable();
            $table->bigInteger('population_25_29')->nullable();
            $table->bigInteger('population_30_34')->nullable();
            $table->bigInteger('population_35_39')->nullable();
            $table->bigInteger('population_40_44')->nullable();
            $table->bigInteger('population_45_49')->nullable();
            $table->bigInteger('population_50_54')->nullable();
            $table->bigInteger('population_55_59')->nullable();
            $table->bigInteger('population_60_64')->nullable();
            $table->bigInteger('population_65_69')->nullable();
            $table->bigInteger('population_70_74')->nullable();
            $table->bigInteger('population_75_79')->nullable();
            $table->bigInteger('population_80_84')->nullable();
            $table->bigInteger('population_85_89')->nullable();
            $table->bigInteger('population_90_94')->nullable();
            $table->bigInteger('population_95_99')->nullable();
            $table->bigInteger('population_100_up')->nullable();
            $table->bigInteger('population_change_0_14')->nullable();
            $table->bigInteger('population_change_15_64')->nullable();
            $table->bigInteger('population_change_65_up')->nullable();
            $table->float('percent_change_0_14',4,1)->nullable();
            $table->float('percent_change_15_64',4,1)->nullable();
            $table->float('percent_change_65_up',4,1)->nullable();
            $table->float('dependency_ratio_youth',5,2)->nullable();
            $table->float('dependency_ratio_senior',5,2)->nullable();
            $table->float('dependency_ratio_combined',5,2)->nullable();
            $table->float('seniors_housing',4,1)->nullable();
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
        Schema::dropIfExists('demographies');
    }
};
