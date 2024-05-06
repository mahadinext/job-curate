<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\v1\careepick\JobApplicationStatus;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('job_application_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('status')->nullable();
            $table->timestamps();
        });

        JobApplicationStatus::create(['status' => 'Pending', 'created_at' => now()]);
        JobApplicationStatus::create(['status' => 'Shortlisted', 'created_at' => now()]);
        JobApplicationStatus::create(['status' => 'Rejected', 'created_at' => now()]);
        JobApplicationStatus::create(['status' => 'Hired', 'created_at' => now()]);
        JobApplicationStatus::create(['status' => 'Closed', 'created_at' => now()]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_application_statuses');
    }
};
