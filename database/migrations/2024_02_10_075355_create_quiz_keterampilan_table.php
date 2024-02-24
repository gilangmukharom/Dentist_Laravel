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
        Schema::create('quiz_keterampilans', function (Blueprint $table) {
            $table->id();
            $table->text('question');
            $table->string('option_a');
            $table->string('image_a')->nullable();
            $table->string('option_b');
            $table->string('image_b')->nullable();
            $table->timestamps();
        });

        Schema::create('jawaban_quiz_keterampilans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pertanyaan_quiz');
            $table->text('answer');
            $table->boolean('is_correct')->default(false);
            $table->timestamps();

            $table->foreign('id_pertanyaan_quiz')->references('id')->on('quiz_keterampilans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quiz_keterampilans');
        Schema::dropIfExists('jawaban_quiz_keterampilans');
    }
};