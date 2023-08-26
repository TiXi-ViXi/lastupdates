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
        Schema::create('_daily_stats_h', function (Blueprint $table) {
            $table->id();
            $table->integer('Admitted_Paitents');
            $table->integer('Released_paitents');
            $table->integer('Daily_Deaths');
            $table->unsignedBigInteger('hospital_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_daily_stats_h');
    }
};
