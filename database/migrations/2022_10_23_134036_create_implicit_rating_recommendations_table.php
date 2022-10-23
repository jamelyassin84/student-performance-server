<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('implicit_rating_recommendations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('implicit_rating_id');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('implicit_rating_recommendations');
    }
};
