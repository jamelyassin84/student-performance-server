<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->string('user_id');
            $table->string('name');
            $table->string('sex');
            $table->string('phone');
            $table->string('department');
            $table->string('degree');
            $table->string('course');
            $table->string('major');
            $table->string('address');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
