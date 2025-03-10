<?php

use App\Models\shortenedURLs;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('shortened_urls', function (Blueprint $table) {
            //
            $table->integer('clickCount')->default(-1);
            $table->string('label', 15)->default("[No Label]");
            $table->timestamp('expiration_date')
                ->default(DB::raw('(DATE_ADD(NOW(), INTERVAL 1 YEAR))'))
                ->check('expiration_date <= DATE_ADD(NOW(), INTERVAL 2 YEAR)');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shortened_urls', function (Blueprint $table) {
            //
            $table->dropColumn('clickCount');
            $table->dropColumn('label');
            $table->dropColumn('expiration_date');
        });
    }
};
