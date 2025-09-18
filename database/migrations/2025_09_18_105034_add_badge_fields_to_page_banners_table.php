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
        Schema::table('page_banners', function (Blueprint $table) {
            $table->string('badge')->nullable()->after('background_media');
            $table->string('badge_color')->default('blue')->after('badge');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('page_banners', function (Blueprint $table) {
            $table->dropColumn(['badge', 'badge_color']);
        });
    }
};
