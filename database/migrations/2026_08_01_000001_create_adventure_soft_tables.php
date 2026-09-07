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
        // 1. Services Table
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('icon');
            $table->text('short_description');
            $table->longText('long_description');
            $table->json('features')->nullable();
            $table->integer('display_order')->default(0);
            $table->boolean('is_featured')->default(false);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        // 2. Technologies Table
        Schema::create('technologies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('category', ['frontend', 'backend', 'mobile', 'database', 'devops', 'ai_ml']);
            $table->string('icon');
            $table->text('description')->nullable();
            $table->boolean('is_featured')->default(true);
            $table->timestamps();
        });

        // 3. Portfolios Table
        Schema::create('portfolios', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('client_name')->nullable();
            $table->string('category');
            $table->string('thumbnail');
            $table->json('gallery_images')->nullable();
            $table->text('challenge')->nullable();
            $table->text('solution')->nullable();
            $table->json('impact_metrics')->nullable();
            $table->json('tech_stack')->nullable();
            $table->string('project_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        // 4. Clients Table
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo');
            $table->string('website')->nullable();
            $table->integer('display_order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        // 5. Testimonials Table
        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('designation');
            $table->string('company');
            $table->string('avatar')->nullable();
            $table->tinyInteger('rating')->default(5);
            $table->text('comment');
            $table->string('video_url')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        // 6. Teams Table
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('designation');
            $table->string('department');
            $table->string('photo');
            $table->text('bio')->nullable();
            $table->json('social_links')->nullable();
            $table->integer('display_order')->default(0);
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        // 7. Job Postings Table
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('department');
            $table->enum('job_type', ['full_time', 'part_time', 'contract', 'remote'])->default('full_time');
            $table->string('experience_level');
            $table->string('location')->default('Dhaka, Bangladesh');
            $table->string('salary_range')->nullable();
            $table->longText('description');
            $table->longText('requirements');
            $table->date('deadline');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });

        // 8. Job Applications Table
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('job_id')->constrained('job_postings')->onDelete('cascade');
            $table->string('applicant_name');
            $table->string('email');
            $table->string('phone');
            $table->string('linkedin_url')->nullable();
            $table->string('portfolio_url')->nullable();
            $table->string('resume_path');
            $table->text('cover_letter')->nullable();
            $table->enum('status', ['pending', 'reviewed', 'shortlisted', 'rejected'])->default('pending');
            $table->timestamps();
        });

        // 9. Inquiries Table
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('company_name')->nullable();
            $table->string('service_requested')->nullable();
            $table->string('estimated_budget')->nullable();
            $table->text('message');
            $table->string('ip_address', 45)->nullable();
            $table->enum('status', ['new', 'in_discussion', 'closed', 'spam'])->default('new');
            $table->timestamps();
        });

        // 10. Site Settings Table
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->longText('value')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
        Schema::dropIfExists('inquiries');
        Schema::dropIfExists('job_applications');
        Schema::dropIfExists('job_postings');
        Schema::dropIfExists('teams');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('clients');
        Schema::dropIfExists('portfolios');
        Schema::dropIfExists('technologies');
        Schema::dropIfExists('services');
    }
};
