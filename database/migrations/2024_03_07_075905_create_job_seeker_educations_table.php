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
        Schema::create('job_seeker_educations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_seeker_id');
            $table->foreign('job_seeker_id')->references('id')->on('job_seekers')->onDelete('cascade');
            $table->unsignedBigInteger('education_level_id')->nullable();
            $table->foreign('education_level_id')->references('id')->on('education_levels')->onDelete('set null');
            $table->unsignedBigInteger('education_degree_title_id')->nullable();
            $table->foreign('education_degree_title_id')->references('id')->on('education_degree_titles')->onDelete('set null');
            $table->string('education_degree_title')->nullable();
            $table->unsignedBigInteger('education_subjects_id')->nullable();
            $table->foreign('education_subjects_id')->references('id')->on('education_subjects')->onDelete('set null');
            $table->string('education_board')->nullable();
            $table->unsignedBigInteger('education_institute_type_id')->nullable();
            $table->foreign('education_institute_type_id')->references('id')->on('institutions_types')->onDelete('set null');
            $table->unsignedBigInteger('school_college_id')->nullable();
            $table->foreign('school_college_id')->references('id')->on('school_and_colleges')->onDelete('set null');
            $table->unsignedBigInteger('university_id')->nullable();
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('set null');
            $table->string('school_name')->nullable();
            $table->string('college_name')->nullable();
            $table->string('madrasha_name')->nullable();
            $table->string('university_name')->nullable();
            $table->unsignedBigInteger('education_result_type_id')->nullable();
            $table->foreign('education_result_type_id')->references('id')->on('education_result_types')->onDelete('set null');
            $table->string('marks')->nullable();
            $table->string('cgpa')->nullable();
            $table->string('scale')->nullable();
            $table->string('duration')->nullable();
            $table->string('year_of_passing')->nullable();
            $table->string('slug')->unique()->nullable();
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_seeker_educations');
    }
};
