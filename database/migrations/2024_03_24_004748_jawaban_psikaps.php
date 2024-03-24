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
        Schema::create('jawaban_psikaps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('qpsikaps_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->integer('jawaban');
            $table->timestamps();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->integer('total_postest_sikap')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_psikaps');
    }
};
