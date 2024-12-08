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
        Schema::create('work_experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained('profiles')->onDelete('cascade');
            $table->enum('experience_type', ['Fresh Graduated', 'Experienced']);
            $table->year('year_from');
            $table->year('year_to');
            $table->string('company_name');
            $table->string('kind_of_business');
            $table->string('last_position');
            $table->decimal('last_take_home_pay', 15, 2);
            $table->text('reason_for_leaving');
            $table->timestamps();
        });

        Schema::create('references', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained('profiles')->onDelete('cascade');
            $table->string('name');
            $table->string('occupation');
            $table->string('phone_number');
            $table->timestamps();
        });

        Schema::create('last_remunerations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained('profiles')->onDelete('cascade');
            $table->decimal('basic_salary', 15, 2);
            $table->enum('basic_salary_type', ['Nett', 'Gross']);
            $table->decimal('allowances', 15, 2);
            $table->enum('allowances_type', ['Nett', 'Gross']);
            $table->decimal('other_benefits', 15, 2)->nullable();
            $table->enum('other_benefits_type', ['Nett', 'Gross'])->nullable();
            $table->decimal('take_home_pay', 15, 2);
            $table->enum('take_home_pay_type', ['Nett', 'Gross']);
            $table->text('other_facilities')->nullable();
            $table->timestamps();
        });

        Schema::create('organizational_structures', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profile_id')->constrained('profiles')->onDelete('cascade');
            $table->longText('structure'); // Nama posisi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_experiences');
    }
};
