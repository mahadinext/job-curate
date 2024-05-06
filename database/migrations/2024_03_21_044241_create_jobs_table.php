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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id')->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('set null');
            $table->unsignedBigInteger('job_category_id')->nullable();
            $table->foreign('job_category_id')->references('id')->on('job_categories')->onDelete('set null');
            $table->string('job_title')->nullable();
            $table->integer('vacancy')->nullable();
            $table->integer('salary_type_id')->nullable();
            $table->string('salary')->nullable();
            $table->integer('age_id')->nullable();
            $table->string('job_location')->nullable();
            $table->integer('experience_id')->nullable();
            $table->string('published')->nullable();
            $table->string('deadline')->nullable();
            $table->text('education')->nullable();
            $table->text('experience_requirments')->nullable();
            $table->text('additional_requirments')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('compensation_benefits')->nullable();
            $table->integer('job_nature')->nullable();
            $table->integer('job_place')->nullable();
            $table->text('job_highlights')->nullable();
            $table->integer('job_status')->nullable()->default(1);
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
        Schema::dropIfExists('jobs');
    }
};
