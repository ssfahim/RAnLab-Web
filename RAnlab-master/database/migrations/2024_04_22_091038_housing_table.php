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
        Schema::create('housing', function (Blueprint $table) {
            $table->id();
            $table->integer('CSDID');
            $table->string('CSDTxt');
            $table->integer('Total_private_dwellings')->default(0);
            $table->integer('Private_dwellings_occupied_by_usual_residents')->default(0);
            $table->integer('Private_dwellings_not_occupied_by_usual_residents')->default(0);
            $table->integer('Average_household_size')->default(0);
            $table->integer('Owner')->default(0);
            $table->integer('Renter')->default(0);
            $table->integer('Total_owner_and_tenant_households_with_household_total_income')->default(0);
            $table->integer('In_core_need')->default(0);
            $table->integer('Not_in_core_need')->default(0);
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
        Schema::dropIfExists('housing');
    }
};
