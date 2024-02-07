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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('submitted_by_id');
            $table->timestamp('date_submitted')->nullable();
            $table->foreignId('reviewer_id')->nullable();
            $table->timestamp('date_reviewed')->nullable();
            $table->enum('status', ['Draft','Pending','Amended','Approved','Rejected','Discarded']);
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
        Schema::dropIfExists('reviews');
    }
};
