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
        Schema::create('job_seekers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('jobseeker_name');
            $table->string('jobseeker_mail');
            $table->string('jobseeker_password');
            $table->string('jobseeker_dob')->nullable();
            $table->string('jobseeker_marital_status')->nullable();
            $table->string('jobseeker_religion')->nullable();
            $table->string('jobseeker_nid_no')->nullable();
            $table->string('jobseeker_gender')->nullable();
            // $table->unsignedBigInteger('jobseeker_gender_id')->nullable();
            // $table->foreign('jobseeker_gender_id')->references('id')->on('genders')->onDelete('set null');
            $table->text('jobseeker_address')->nullable();
            $table->string('jobseeker_image')->nullable();
            $table->string('jobseeker_custom_resume')->nullable();
            $table->text('jobseeker_career_summary')->nullable();
            $table->string('jobseeker_website_url')->nullable();
            $table->string('jobseeker_linkedin_url')->nullable();
            $table->string('jobseeker_facebook_url')->nullable();
            $table->string('jobseeker_phone_no_1');
            $table->string('jobseeker_phone_no_2')->nullable();
            $table->integer('jobseeker_status')->default(1);
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
        Schema::dropIfExists('job_seekers');
    }
};
