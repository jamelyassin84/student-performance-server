<?php

use App\Enums\SemesterEnum;
use App\Enums\YearLevelEnum;
use App\Models\Student;
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
        Schema::create('performances', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('student_id');
            $table->string('year_level')->default(YearLevelEnum::FIRST());
            $table->string('semester')->default(SemesterEnum::FIRST());
            $table->integer('performance');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performances');
    }
};
