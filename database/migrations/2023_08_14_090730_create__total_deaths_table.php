<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('_total_deaths', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Hospital_ID'); //foreign key from Hospital Table
            $table->integer('Total_Deaths');
            $table->integer('Current_Paitents');
            $table->integer('Vacant_Seats');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_total_deaths');
    }
};
