<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->string('option1');
            $table->string('option2');
            $table->string('correct_option'); // Menyimpan nilai pilihan yang benar
            $table->string('image_path')->nullable(); // Menyimpan path gambar
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
