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
        Schema::table('shortened_urls', function (Blueprint $table) {
            //
            $table->dropUnique('shortened_urls_longURL_unique'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shortened_urls', function (Blueprint $table) {
            //
            // Add the unique index back if you rollback the migration.
            $table->unique('longURL');
        });
    }
};
