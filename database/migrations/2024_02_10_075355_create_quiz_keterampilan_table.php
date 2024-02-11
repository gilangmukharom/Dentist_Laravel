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
            $table->text('pertanyaan');
            $table->timestamps();
        });

        Schema::create('jawaban_quiz_keterampilans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pertanyaan_quiz');
            $table->string('jawaban');
            $table->boolean('jawaban_benar');
            $table->string('image_path')->nullable();
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
