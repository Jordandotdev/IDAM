<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Listing;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Listing::class)->constrained(); // Assuming this links to the listing the contract is for
            $table->string('agreement', 1500);
            $table->integer('contract_period')->default(3);
            $table->date('bid_date')->nullable();
            $table->time('bid_time')->default("00:00:00")->nullable();
            $table->integer('bid_duration')->default(24)->nullable();
            $table->enum('status', ['Rent', 'Sale'])->default('Rent');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contracts');
    }
};