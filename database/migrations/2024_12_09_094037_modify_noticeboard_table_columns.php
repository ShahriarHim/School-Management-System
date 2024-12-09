<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // In a new migration file:
        Schema::table('notice_board_details', function (Blueprint $table) {
            // $table->unsignedBigInteger('notice_board_id');

            // Optionally, add a foreign key constraint
            // $table->foreign('notice_board_id')->references('id')->on('notice_boards')->onDelete('cascade');
            $table->dropForeign(['notice_id']);
            $table->dropColumn(['notice_id']);
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
