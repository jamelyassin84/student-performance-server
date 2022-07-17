<?php

use App\Enums\QuestionValueTypeEnum;
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
        Schema::create('survey_questions', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->string('title');
            $table->text('question');
            $table->tinyInteger('show_on_website');
            $table->string('question_value_type')->default(QuestionValueTypeEnum::POSITIVE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('survey_questions');
    }
};
