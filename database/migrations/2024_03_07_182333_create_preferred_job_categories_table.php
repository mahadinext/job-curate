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
        Schema::create('preferred_job_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_seeker_id');
            $table->foreign('job_seeker_id')->references('id')->on('job_seekers')->onDelete('cascade');
            $table->unsignedBigInteger('job_category_id');
            $table->foreign('job_category_id')->references('id')->on('job_categories')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preferred_job_categories');
    }
};
