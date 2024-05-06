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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('company_name');
            $table->string('company_bn_name')->nullable();
            $table->string('company_year_of_establishment');
            $table->string('company_logo');
            $table->string('company_slogan')->nullable();
            $table->string('company_bn_slogan')->nullable();
            $table->string('company_mail');
            $table->string('company_password');
            $table->text('company_description')->nullable();
            $table->integer('company_country');
            $table->integer('company_district');
            $table->integer('company_upazila');
            $table->string('company_address_1');
            $table->string('company_address_2')->nullable();
            $table->string('company_address_3')->nullable();
            $table->string('company_google_map_address')->nullable();
            $table->string('company_phone_no_1');
            $table->string('company_phone_no_2')->nullable();
            $table->string('company_phone_no_3')->nullable();
            $table->string('company_website_url')->nullable();
            $table->string('company_linkedin_url')->nullable();
            $table->string('company_facebook_url')->nullable();
            $table->string('company_glassdoor_url')->nullable();
            $table->unsignedBigInteger('company_size')->nullable();
            $table->foreign('company_size')->references('id')->on('employee_sizes')->onDelete('set null');
            $table->unsignedBigInteger('working_hour')->nullable();
            $table->foreign('working_hour')->references('id')->on('working_hours')->onDelete('set null');
            $table->string('company_tin_no')->nullable();
            $table->string('company_bin_no')->nullable();
            $table->string('company_trade_license_no');
            $table->string('company_trade_license_document');
            $table->integer('company_status')->default(1);
            $table->integer('terms_and_condition_agreement');
            $table->integer('privacy_and_policy_agreement');
            $table->string('slug')->unique();
            $table->tinyText('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
