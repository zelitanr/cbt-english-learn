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
Schema::create('hasil_quiz', function (Blueprint $table) {
    $table->id();
    $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
    $table->foreignId('quiz_id')->constrained('quiz')->cascadeOnDelete();
    $table->unsignedInteger('nilai');
    $table->unsignedInteger('waktu_pengerjaan'); // menit
    $table->timestamps(); // dipakai untuk rekap per semester (Phase 6)
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_quizzes');
    }
};
