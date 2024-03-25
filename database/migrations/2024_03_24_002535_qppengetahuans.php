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
        Schema::create('qppengetahuans', function (Blueprint $table) {
            $table->id();
            $table->text('pertanyaan');
            $table->json('pilihan');
            $table->string('jawaban_benar');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->integer('total_postest_pengetahuan')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qppengetahuans');
    }
};
