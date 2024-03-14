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
        Schema::create('daily_cores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->date('tanggal_daily')->nullable();
            $table->date('tanggal_input')->nullable();
            $table->string('nama')->nullable();
            $table->integer('nomor');
            $table->time('waktu_sikat_gigi_pagi')->nullable();
            $table->time('waktu_sikat_gigi_malam')->nullable();
            $table->string('bukti')->nullable();
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_cores');
    }
};