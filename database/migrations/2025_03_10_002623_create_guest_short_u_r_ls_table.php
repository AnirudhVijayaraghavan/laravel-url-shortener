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
        Schema::create('guestshorturls', function (Blueprint $table) {
            $table->id();
            $table->string('longURL')->unique();
            $table->string('shortURL')->unique();
            $table->timestamp('expiration_date')
                ->default(DB::raw('(DATE_ADD(NOW(), INTERVAL 1 MONTH))'))
                ->check('expiration_date <= DATE_ADD(NOW(), INTERVAL 1 MONTH)');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guestshorturls');
    }
};
