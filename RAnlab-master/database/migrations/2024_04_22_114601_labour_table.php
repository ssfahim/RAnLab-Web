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
        Schema::create('labour', function (Blueprint $table) {
            $table->id();
            $table->string('CSDID');
            $table->string('CSDTxt');
            $table->integer('Total_Highest_certificate_diploma_or_degree')->nullable();
            $table->integer('No_certificate_diploma_or_degree')->nullable();
            $table->integer('High_school_diploma')->nullable();
            $table->integer('Postsecondary_certificate_or_diploma_below_bachelor')->nullable();
            $table->integer('Bachelor_degree')->nullable();
            $table->integer('University_certificate_or_diploma_above_bachelor')->nullable();
            $table->integer('Total_Population_aged_15_years_and_over_by_labour_force')->nullable();
            $table->integer('Participation_rate')->nullable();
            $table->integer('Unemployment_rate')->nullable();
            $table->integer('Average_weeks_worked_in_reference_year')->nullable();
            $table->integer('Worked_full_year_full_time')->nullable();
            $table->integer('Worked_part_year_and_or_part_time')->nullable();
            $table->integer('Total_Labour_force_aged_15_years_and_over_by_occupation')->nullable();
            $table->integer('Occupation_not_applicable')->nullable();
            $table->integer('All_occupations')->nullable();
            $table->integer('Legislative_and_senior_management_occupations')->nullable();
            $table->integer('Business_finance_and_administration_occupations')->nullable();
            $table->integer('Natural_and_applied_sciences_and_related_occupations')->nullable();
            $table->integer('Health_occupations')->nullable();
            $table->integer('Occupations_in_education_law_and_social')->nullable();
            $table->integer('Occupations_in_art_culture_recreation_and_sport')->nullable();
            $table->integer('Sales_and_service_occupations')->nullable();
            $table->integer('Trades_transport_and_equipment_operators')->nullable();
            $table->integer('Natural_resources_agriculture_and_related')->nullable();
            $table->integer('Occupations_in_manufacturing_and_utilities')->nullable();
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
        Schema::dropIfExists('labour');
    }
};
