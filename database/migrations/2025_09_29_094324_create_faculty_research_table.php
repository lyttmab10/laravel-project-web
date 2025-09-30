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
        Schema::create('faculty_research', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // ชื่องาน
            $table->string('type'); // ประเภทผลงาน (เช่น วิจัย, วิทยากร)
            $table->unsignedBigInteger('faculty_id'); // เชื่อมโยงกับชื่ออาจารย์
            $table->string('image')->nullable(); // รูปภาพ
            $table->text('description')->nullable(); // รายละเอียด
            $table->foreign('faculty_id')->references('id')->on('faculty');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty_research');
    }
};
