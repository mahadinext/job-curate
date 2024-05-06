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
        Schema::create('job_seeker_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_seeker_id');
            $table->foreign('job_seeker_id')->references('id')->on('job_seekers')->onDelete('cascade');
            $table->string('organization_name');
            $table->string('designation');
            $table->text('responsibilities')->nullable();
            $table->integer('start_date')->nullable();
            $table->string('start_month');
            $table->integer('start_year');
            $table->integer('end_date')->nullable();
            $table->string('end_month')->nullable();
            $table->integer('end_year')->nullable();
            $table->string('currently_working')->default('no');
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
        Schema::dropIfExists('job_seeker_experiences');
    }
};
