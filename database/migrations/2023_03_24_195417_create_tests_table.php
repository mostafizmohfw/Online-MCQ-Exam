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
        Schema::create('tests', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->string('correct_answer');
            $table->string('user_answered');
            $table->foreignId('user_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            // $table->foreignId('result_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('quiz_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('question_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
