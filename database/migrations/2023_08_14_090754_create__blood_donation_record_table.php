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
        Schema::create('_blood_donation_record', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Paitent_ID'); // foreign key from paitent table
            $table->unsignedBigInteger('Donor_ID'); // foreign key from donor table
            $table->string('City');
            $table->string('Paitent_Phone');
            $table->string('Donor_Phone');
            $table->enum('Blood_Group', ['A+', 'A-','B+', 'B-','AB+', 'AB-','O+', 'O-','None'])
            ->default('None') // Optional: Set a default value if needed
            ->nullable(false);
            $table->date('Donation_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_blood_donation_record');
    }
};
