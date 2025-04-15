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
        Schema::create('specialities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained('profiles')->onDelete('cascade'); // Relasi ke tabel profiles
            $table->string('kind')->nullable(); // Jenis pelatihan atau keahlian
            $table->year('year')->nullable(); // Tahun pelatihan atau sertifikasi
            $table->string('institution')->nullable(); // Nama institusi atau lembaga yang memberikan pelatihan
            $table->enum('certified', ['Yes', 'No'])->default('No'); // Sertifikat atau tidak
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specialities');
    }
};
