<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('implicit_ratings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->float('average');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('implicit_ratings');
    }
};
