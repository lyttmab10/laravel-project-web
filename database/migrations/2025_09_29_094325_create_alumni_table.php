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
        Schema::create('alumni', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // ชื่อ
            $table->string('position'); // ตำแหน่งงาน
            $table->string('company'); // บริษัท
            $table->text('role')->nullable(); // บทบาทที่เคยร่วมกิจกรรม
            $table->string('image')->nullable(); // รูปภาพ
            $table->integer('graduation_year')->nullable(); // ปีที่จบการศึกษา
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni');
    }
};
