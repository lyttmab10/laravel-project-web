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
        Schema::create('student_projects', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // ชื่อโครงการ
            $table->string('student_name'); // ชื่อนักศึกษา
            $table->integer('year'); // ปีที่ทำ
            $table->string('image')->nullable(); // รูปภาพ
            $table->text('description')->nullable(); // รายละเอียด
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_projects');
    }
};
