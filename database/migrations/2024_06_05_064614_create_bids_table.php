<?php

use App\Models\Listing;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->id();
            $table->decimal('base_bid', 10, 2);
            $table->decimal('current_bid', 10, 2);
            $table->date('bid_date')->nullable();
            $table->time('bid_time')->default("00:00:00")->nullable();
            $table->integer('bid_duration')->default(24)->nullable();        
            $table->boolean('status')->default(0);
            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Listing::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bids');
    }
};
