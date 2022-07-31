<?php

use App\Enums\SemesterEnum;
use App\Enums\YearLevelEnum;
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
        Schema::create('guidance_requests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('student_id');
            $table->string('year_level')->default(YearLevelEnum::FIRST());
            $table->string('semester')->default(SemesterEnum::FIRST());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guidance_requests');
    }
};
