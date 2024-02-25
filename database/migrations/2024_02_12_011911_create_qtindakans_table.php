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
        Schema::create('qtindakans', function (Blueprint $table) {
            $table->id();
            $table->text('pertanyaan');
            $table->json('pilihan');
            $table->string('jawaban_benar');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->integer('total_jawaban_tindakans')->default(0);
            $table->date('tanggal_pretest')->nullable();
            $table->date('tanggal_postest')->nullable();
            $table->date('tanggal_quiz_keterampilan')->nullable();
            $table->date('tanggal_quiz_pengetahuan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qtindakans');
    }
};