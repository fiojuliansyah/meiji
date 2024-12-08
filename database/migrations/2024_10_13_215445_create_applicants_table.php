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
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->index();
            $table->foreignId('career_id')->nullable()->index();
            $table->foreignId('status_id')->nullable()->index();
            // Kolom tambahan yang relevan dengan form yang diberikan
            $table->enum('geographical_restriction', ['YES', 'NO'])->nullable(); // Apakah ada batasan geografis
            $table->text('geographical_restriction_reason')->nullable(); // Alasan jika ada batasan geografis
            $table->text('reason_for_applying')->nullable(); // Alasan melamar posisi ini
            $table->enum('has_relative_in_company', ['YES', 'NO'])->nullable(); // Apakah ada kerabat yang bekerja di perusahaan
            $table->json('positive_points')->nullable(); // Daftar sisi positif pelamar
            $table->json('negative_points')->nullable(); // Daftar sisi negatif pelamar
            $table->text('other_information')->nullable(); // Informasi lain yang perlu dipertimbangkan
            $table->json('medical_history')->nullable(); // Riwayat penyakit yang diderita
            $table->json('medical_history_year')->nullable(); // Tahun penyakit yang diderita
            $table->enum('hospitalized', ['YES', 'NO'])->nullable(); // Pernah dirawat di rumah sakit
            $table->text('signature')->nullable(); // Tanda tangan pelamar (bisa teks atau gambar URL)
            $table->timestamp('signature_date')->nullable(); // Tanggal tanda tangan

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
