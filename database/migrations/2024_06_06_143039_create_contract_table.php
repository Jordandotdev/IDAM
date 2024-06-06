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
            $table->string('agreement', 500);
            $table->integer('contract_period')->default(3);
            $table->decimal('contract_price');

            $table->foreignIdFor(User::class);
            $table->foreignIdFor(Listing::class);

            $table->date('bid_date')->nullable();
            $table->time('bid_time')->default("00:00:00")->nullable();
            $table->integer('bid_duration')->default(24)->nullable();        
            $table->boolean('status')->default(0);
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
