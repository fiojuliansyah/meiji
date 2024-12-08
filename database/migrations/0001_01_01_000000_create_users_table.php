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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('phone_verified')->default(false);
            $table->boolean('is_admin')->default(false);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->date('validate_date')->nullable();
            $table->text('document_url')->nullable();
            $table->string('document_public_id')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->index();
            $table->text('avatar_url')->nullable();
            $table->string('avatar_public_id')->nullable();
            $table->string('nik', 16)->nullable();
            $table->text('address')->nullable();
            $table->string('gender', 10)->nullable();
            $table->string('birth_place')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('religion')->nullable(); // Tambahkan field agama
            $table->string('height_weight')->nullable(); // Tambahkan field tinggi/berat badan
            $table->string('blood_type')->nullable(); // Tambahkan field golongan darah
            $table->string('nationality')->nullable(); // Tambahkan field kewarganegaraan
            $table->string('driving_licenses')->nullable(); // Tambahkan field SIM
            $table->string('transportation')->nullable(); // Tambahkan field kendaraan
            $table->string('place_of_origin')->nullable(); // Tambahkan field asal daerah
            $table->string('status_of_residence')->nullable(); // Tambahkan field status tempat tinggal
            $table->string('telephone')->nullable(); // Tambahkan field telepon rumah
            $table->string('cellphone_1')->nullable(); // Tambahkan field handphone 1
            $table->string('cellphone_2')->nullable(); // Tambahkan field handphone 2
            $table->string('email_address')->nullable(); // Tambahkan field email
            $table->string('current_address')->nullable(); // Tambahkan field alamat saat ini
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        Schema::create('parents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained('profiles')->onDelete('cascade'); // FK ke profiles
            $table->string('father_name')->nullable();
            $table->integer('father_age')->nullable();
            $table->string('father_education')->nullable();
            $table->string('father_occupation')->nullable();
            $table->string('father_employer')->nullable();
            $table->string('mother_name')->nullable();
            $table->integer('mother_age')->nullable();
            $table->string('mother_education')->nullable();
            $table->string('mother_occupation')->nullable();
            $table->string('mother_employer')->nullable();
            $table->string('spouse_name')->nullable();
            $table->integer('spouse_age')->nullable();
            $table->string('spouse_education')->nullable();
            $table->string('spouse_occupation')->nullable();
            $table->string('spouse_employer')->nullable();
            $table->timestamps(); // created_at, updated_at
        });

        Schema::create('children', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained('profiles')->onDelete('cascade'); // FK ke profiles
            $table->string('name')->nullable();
            $table->enum('gender', ['M', 'F'])->nullable(); // Menyimpan jenis kelamin M atau F
            $table->integer('age')->nullable();
            $table->timestamps(); // created_at, updated_at
        });

        Schema::create('siblings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained('profiles')->onDelete('cascade'); // FK ke profiles
            $table->string('name')->nullable();
            $table->enum('gender', ['M', 'F'])->nullable(); // Menyimpan jenis kelamin M atau F
            $table->integer('age')->nullable();
            $table->string('education')->nullable();
            $table->string('occupation')->nullable();
            $table->string('employer_name')->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('documents');
        Schema::dropIfExists('profiles');
        Schema::dropIfExists('parents');
        Schema::dropIfExists('children');
        Schema::dropIfExists('siblings');
    }
};
