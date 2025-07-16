<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeBannersTable extends Migration
{
    public function up()
    {
        Schema::create('home_banners', function (Blueprint $table) {
            $table->id();
            $table->string('title_line1');
            $table->string('title_line2');
            $table->text('subtitle');
            $table->string('background_image')->nullable();  // background image path
            $table->string('person_image')->nullable();      // person image path
            $table->string('cv_file')->nullable();
            $table->timestamps();
        });
        
    }

    public function down()
    {
        Schema::dropIfExists('home_banners');
    }
}
