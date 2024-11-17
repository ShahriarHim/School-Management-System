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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->tinyInteger('role')->comment('1: Student, 2: Admin, 3: Teacher'); // Role field with integer mapping
            $table->string('image')->nullable(); // Image field (optional)
            $table->string('designation')->nullable(); // Designation (optional)
            $table->text('description')->nullable(); // Description (optional)
            $table->string('fb')->nullable(); // Facebook profile link
            $table->string('twitter')->nullable(); // Twitter profile link
            $table->string('linkedin')->nullable(); // LinkedIn profile link
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
