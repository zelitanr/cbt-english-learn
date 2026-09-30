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
Schema::create('quiz', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
    $table->foreignId('kategori_id')->constrained('kategori')->cascadeOnDelete();
    $table->string('judul');
    $table->json('daftar_soal');
    $table->unsignedInteger('jumlah_soal')->default(0);
    $table->unsignedInteger('durasi'); // menit
    $table->timestamps();
    $table->unsignedInteger('durasi'); // menit
    $table->date('tenggat')->nullable();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('quizzes');
    }
};
