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
        Schema::create('journals', function (Blueprint $table) {
            $table->id();
            $table->string('id_guru_piket');
            $table->foreignId('id_teacher')->constrained('teachers')->onDelete('cascade');
            $table->foreignId('id_studyroom')->constrained('studyrooms')->onDelete('cascade');
            $table->foreignId('id_lesson')->constrained('lessons')->onDelete('cascade');
            $table->string('jp_mulai');
            $table->string('jp_selesai');
            $table->enum('status', ['hadir', 'sakit', 'izin', 'tanpa_keterangan']);
            $table->text('keterangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('journals');
    }
};
