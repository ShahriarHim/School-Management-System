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
        Schema::table('notice_board_details', function (Blueprint $table) {
            Schema::table('notice_board_details', function (Blueprint $table) {
                // Drop the foreign key constraint first
                $table->dropForeign(['user_id']);  // You can replace 'user_id' with the exact column name if it's different
                // Then drop the column
                $table->dropColumn('user_id');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('notice_board_details', function (Blueprint $table) {
            //
        });
    }
};
