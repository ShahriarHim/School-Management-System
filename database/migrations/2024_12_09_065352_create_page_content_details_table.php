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
        Schema::create('page_content_details', function (Blueprint $table) {
            $table->id();
            $table->longText('content')->nullable();
            $table->unsignedBigInteger('page_content_id');
            $table->foreign('page_content_id')->references('id')->on('page_contents')->onDelete('cascade');
            $table->timestamps();            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_content_details');
    }
};
