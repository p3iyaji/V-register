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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); // Title of the visitor (e.g., Mr., Mrs., Dr.)
            $table->string('first_name'); // First name of the visitor
            $table->string('last_name'); // Last name of the visitor
            $table->string('email')->nullable(); // Email of the visitor (optional)
            $table->string('phone')->nullable(); // Phone number of the visitor (optional)
            $table->enum('gender', ['male', 'female', 'other'])->nullable(); // Gender of the visitor
            $table->string('company_name')->nullable(); // Company name of the visitor (optional)
            $table->string('national_id_no')->nullable(); // National ID number of the visitor (optional)
            $table->text('purpose')->nullable(); // Purpose of the visit (optional)
            $table->text('address')->nullable(); // Address of the visitor (optional)
            $table->string('image')->nullable(); // Path to the visitor's image (optional)
            $table->timestamp('check_in')->nullable(); // Check-in time of the visitor (nullable)
            $table->timestamp('check_out')->nullable(); // Check-out time of the visitor (nullable)
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending'); // Status of the visit
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('employee_id')->nullable()->constrained('users')->onDelete('cascade');
            $table->string('type')->default('walk-in'); // Whether the user is a regular user (default: true)
            $table->date('expected_date')->nullable();
            $table->time('expected_time')->nullable();
            $table->text('comment')->nullable(); // Additional comments about the visit (optional)
            $table->foreignId('approved_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->timestamps(); // Created at and updated at timestamps
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
