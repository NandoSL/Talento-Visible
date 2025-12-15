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
        Schema::create('exam_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('exam_id')->nullable();

            $table->boolean('course_completed')->default(false);
            $table->boolean('camera_detection')->default(false);
            $table->boolean('camera_screen_record')->default(false);
            $table->boolean('microphone_required')->default(false);
            $table->boolean('keyboard_events')->default(false);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_settings');
    }
};
