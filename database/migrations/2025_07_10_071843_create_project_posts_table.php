<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('project_posts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();         // ✅ Image field
            $table->string('github_link')->nullable();   // ✅ GitHub link field
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('project_posts');
    }
};
