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
        Schema::create('computer_skills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained('profiles')->onDelete('cascade'); // Relasi ke tabel profiles
            $table->string('program_name')->nullable(); // Nama program komputer (misalnya Microsoft Excel, Adobe Photoshop, dll)
            $table->string('skill_level')->nullable(); // Tingkat keahlian pengguna dalam program tersebut
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('computer_skills');
    }
};
