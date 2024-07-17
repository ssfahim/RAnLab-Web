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
        Schema::create('food_price_table', function (Blueprint $table) {
            $table->id();
            // $table->string("Jan-2017");
            // $table->string("Feb-2017");
            // $table->string("Mar-2017");
            // $table->string("Apr-2017");
            // $table->string("May-2017");
            // $table->string("Jun-2017");
            // $table->string("Jul-2017");
            // $table->string("Aug-2017");
            // $table->string("Sep-2017");
            // $table->string("Oct-2017");
            // $table->string("Nov-2017");
            // $table->string("Dec-2017");

            // $table->string("Jan-2018");
            // $table->string("Feb-2018");
            // $table->string("Mar-2018");
            // $table->string("Apr-2018");
            // $table->string("May-2018");
            // $table->string("Jun-2018");
            // $table->string("Jul-2018");
            // $table->string("Aug-2018");
            // $table->string("Sep-2018");
            // $table->string("Oct-2018");
            // $table->string("Nov-2018");
            // $table->string("Dec-2018");

            // $table->string("Jan-2019");
            // $table->string("Feb-2019");
            // $table->string("Mar-2019");
            // $table->string("Apr-2019");
            // $table->string("May-2019");
            // $table->string("Jun-2019");
            // $table->string("Jul-2019");
            // $table->string("Aug-2019");
            // $table->string("Sep-2019");
            // $table->string("Oct-2019");
            // $table->string("Nov-2019");
            // $table->string("Dec-2019");

            $table->string("Jan-2020");
            $table->string("Feb-2020");
            $table->string("Mar-2020");
            $table->string("Apr-2020");
            $table->string("May-2020");
            $table->string("Jun-2020");
            $table->string("Jul-2020");
            $table->string("Aug-2020");
            $table->string("Sep-2020");
            $table->string("Oct-2020");
            $table->string("Nov-2020");
            $table->string("Dec-2020");

            $table->string("Jan-2021");
            $table->string("Feb-2021");
            $table->string("Mar-2021");
            $table->string("Apr-2021");
            $table->string("May-2021");
            $table->string("Jun-2021");
            $table->string("Jul-2021");
            $table->string("Aug-2021");
            $table->string("Sep-2021");
            $table->string("Oct-2021");
            $table->string("Nov-2021");
            $table->string("Dec-2021");

            $table->string("Jan-2022");
            $table->string("Feb-2022");
            $table->string("Mar-2022");
            $table->string("Apr-2022");
            $table->string("May-2022");
            $table->string("Jun-2022");
            $table->string("Jul-2022");
            $table->string("Aug-2022");
            $table->string("Sep-2022");
            $table->string("Oct-2022");
            $table->string("Nov-2022");
            $table->string("Dec-2022");

            $table->string("Jan-2023");
            $table->string("Feb-2023");
            $table->string("Mar-2023");
            $table->string("Apr-2023");
            $table->string("May-2023");
            $table->string("Jun-2023");
            $table->string("Jul-2023");
            $table->string("Aug-2023");
            $table->string("Sep-2023");
            $table->string("Oct-2023");
            $table->string("Nov-2023");
            $table->string("Dec-2023");

            $table->string("Jan-2024");
            $table->string("Feb-2024");
            $table->string("Mar-2024");
            $table->string("Apr-2024");
            $table->string("May-2024");

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
        Schema::dropIfExists('food_price_table');
    }
};
