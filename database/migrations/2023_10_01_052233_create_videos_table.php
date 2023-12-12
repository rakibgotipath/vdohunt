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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->default(0);
            $table->string('name')->nullable();
            $table->string('bunny_id')->nullable();
            $table->integer('duration')->default(0);
            $table->tinyInteger('status')->default(0)->comment('0=Pending, 1=Approved, 2=Rejected');
            $table->tinyInteger('video_status')->default(0)->comment('0=Queued, 1=Processing, 2=Encoding, 3=Finished, 4=Resolution finished, 5=Failed, 6=Deleted');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
    }
};
