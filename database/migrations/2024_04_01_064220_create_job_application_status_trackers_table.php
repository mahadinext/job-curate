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
        Schema::create('job_application_status_trackers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('job_id')->nullable();
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');
            $table->unsignedBigInteger('js_id')->nullable();
            $table->foreign('js_id')->references('id')->on('job_seekers')->onDelete('cascade');
            $table->integer('company_id')->nullable();
            $table->string('job_application_status')->nullable()->default(1);
            $table->string('scheduled_day')->nullable();
            $table->string('scheduled_date')->nullable();
            $table->string('scheduled_time')->nullable();
            $table->string('scheduled_location')->nullable();
            $table->text('scheduled_address')->nullable();
            $table->string('scheduled_url')->nullable();
            $table->text('required_documents')->nullable();
            $table->text('read')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_application_status_trackers');
    }
};
