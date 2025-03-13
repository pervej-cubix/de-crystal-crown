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
        Schema::create('accomodation_gallaries', function (Blueprint $table) {
            $table->id();

            $table->foreignId('accommodation_id')->constrained('accomodations')->onDelete('cascade');
            $table->text('accommodation_photo');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('accomodation_gallaries');
    }
};
