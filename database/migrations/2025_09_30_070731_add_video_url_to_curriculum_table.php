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
        Schema::table('curriculum', function (Blueprint $table) {
            $table->string('video_url')->nullable()->after('pdf_url'); // YouTube URL สำหรับวิดีโอแนะนำหลักสูตร
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('curriculum', function (Blueprint $table) {
            $table->dropColumn('video_url');
        });
    }
};
