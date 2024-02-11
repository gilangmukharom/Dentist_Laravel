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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('total_jawaban_sikap')->default(0); // Menggunakan integer untuk menyimpan total jawaban, defaultnya adalah 0
            $table->integer('total_jawaban_keterampilan')->default(0); // Menggunakan integer untuk menyimpan total jawaban, defaultnya adalah 0
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('total_jawaban_sikap'); // Jika perlu, Anda dapat menambahkan perintah untuk menghapus kolom ini pada saat rollback migrasi
            $table->dropColumn('total_jawaban_keterampilan'); // Jika perlu, Anda dapat menambahkan perintah untuk menghapus kolom ini pada saat rollback migrasi
        });
    }
};
