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
        Schema::table('home_banners', function (Blueprint $table) {
            $table->string('title_line1')->nullable()->change();
            $table->string('title_line2')->nullable()->change();
            $table->text('subtitle')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('home_banners', function (Blueprint $table) {
            $table->string('title_line1')->nullable(false)->change();
            $table->string('title_line2')->nullable(false)->change();
            $table->text('subtitle')->nullable(false)->change();
        });
    }
};
