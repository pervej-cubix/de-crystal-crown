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
        Schema::create('stars', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('second_title');
            $table->string('icon')->nullable();
            $table->text('description');
            $table->text('image')->nullable();
            $table->boolean('status')->default(1)->nullable()->comment('1: Published; 0: Unpublished');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stars');
    }
};
