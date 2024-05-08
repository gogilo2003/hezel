<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 20, 2)->nullable();
            $table->string('longitude')->nullable();
            $table->string('lattitude')->nullable();
            $table->string('status')->nullable();
            $table->string('location')->nullable();
            $table->boolean('featured')->default(false);
            $table->boolean('published')->default(false);
            $table->boolean('hot')->default(false);
            $table->foreignId('county_id')->nullable();
            $table->foreignId('sub_county_id')->nullable();
            $table->foreignId('ward_id')->nullable();
            $table->foreignId('town_id')->nullable();
            $table->timestamps();
            $table->foreign('county_id')->references('id')->on('counties');
            $table->foreign('sub_county_id')->references('id')->on('sub_counties');
            $table->foreign('ward_id')->references('id')->on('wards');
            $table->foreign('town_id')->references('id')->on('towns');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
