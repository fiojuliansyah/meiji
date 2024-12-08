<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained('profiles')->onDelete('cascade'); // Relasi ke tabel profiles
            $table->enum('type', ['Formal', 'Non-Formal'])->default('Formal'); // Jenis pendidikan (formal atau non-formal)
            $table->string('school_name')->nullable(); // Nama sekolah/institusi
            $table->string('majoring')->nullable(); // Jurusan (jika ada)
            $table->year('year_from')->nullable(); // Tahun mulai
            $table->year('year_to')->nullable(); // Tahun selesai
            $table->text('remarks')->nullable(); // Keterangan tambahan (jika ada)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('educations');
    }
};
