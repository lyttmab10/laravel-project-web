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
        Schema::create('curriculum', function (Blueprint $table) {
            $table->id();
            $table->string('degree_name_th'); // ชื่อปริญญาไทย
            $table->string('degree_name_en'); // ชื่อปริญญาอังกฤษ  
            $table->string('degree_abbr_th'); // ชื่อย่อไทย
            $table->string('degree_abbr_en'); // ชื่อย่ออังกฤษ
            $table->string('program_type'); // รูปแบบหลักสูตร
            $table->integer('duration_years'); // ระยะเวลาเรียน (ปี)
            $table->integer('credits'); // หน่วยกิต
            $table->string('language'); // ภาษาที่ใช้
            $table->decimal('tuition_fee', 10, 2); // ค่าเรียนต่อเทอม
            $table->text('description')->nullable(); // คำอธิบาย
            $table->string('curriculum_year'); // ปีที่ปรับปรุงหลักสูตร
            $table->string('pdf_url')->nullable(); // ลิงก์ PDF รายละเอียด
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('curriculum');
    }
};
