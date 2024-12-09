<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoticeBoardDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notice_board_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('notice_board_id')->constrained('notice_boards')->onDelete('cascade'); // Foreign key to notice_boards
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Foreign key to users (creator)
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->date('date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notice_board_details');
    }
}

