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
        Schema::create('language_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained('profiles')->onDelete('cascade'); // Relasi ke tabel profiles
            $table->string('language')->nullable(); // Nama bahasa
            $table->enum('read_level', ['Beginner', 'Basic', 'Intermediate', 'Advanced', 'Proficient'])->nullable(); // Tingkat kemampuan membaca
            $table->enum('write_level', ['Beginner', 'Basic', 'Intermediate', 'Advanced', 'Proficient'])->nullable(); // Tingkat kemampuan menulis
            $table->enum('speak_level', ['Beginner', 'Basic', 'Intermediate', 'Advanced', 'Proficient'])->nullable(); // Tingkat kemampuan berbicara
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('language_skills');
    }
};
