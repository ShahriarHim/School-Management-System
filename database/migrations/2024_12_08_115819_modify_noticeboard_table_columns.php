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
        Schema::table('notice_boards', function (Blueprint $table) {
            $table->foreignId('created_by')->constrained('users')->onDelete('cascade'); 
            $table->dropColumn(['image', 'description','date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notice_boards', function (Blueprint $table) {
            //
        });
    }
};
