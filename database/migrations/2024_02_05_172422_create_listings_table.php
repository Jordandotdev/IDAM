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
        Schema::create('listings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->tinyInteger('property_type')->nullable();
            $table->integer('bedrooms')->nullable();
            $table->integer('bathrooms')->nullable();
            $table->integer('floor_area')->nullable();
            $table->integer('floors')->nullable();
            $table->decimal('land_area', 10, 2)->nullable();
            $table->enum('availability', ['Available','Sold','In_Disussion'])->nullable();
            $table->integer('car_parking_spaces')->nullable();
            $table->tinyInteger('furnishing_status')->nullable();
            $table->integer('age_of_building')->nullable();
            $table->integer('width_of_approach_road')->nullable();
            $table->timestamps();
        });

        Schema::create('property_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
            $table->string('feature');
            $table->timestamps();
        });

        Schema::create('distances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
            $table->string('location');
            $table->string('distance');
            $table->string('time_to_reach');
            $table->timestamps();
        });

        Schema::create('contact_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
            $table->string('agent_name');
            $table->string('email');
            $table->string('contact_number');
            $table->text('message')->nullable();
            $table->timestamps();
        });

        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('listing_id')->constrained()->onDelete('cascade');
            $table->string('path'); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('images');
        Schema::dropIfExists('contact_details');
        Schema::dropIfExists('distances');
        Schema::dropIfExists('property_features');
        Schema::dropIfExists('listings');
    }
};
