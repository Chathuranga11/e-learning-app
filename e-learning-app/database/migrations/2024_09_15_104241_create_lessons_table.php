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
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();
            $table->string('lesson_name'); // Add this column
            $table->text('lesson_description'); // Add this column
            $table->date('lesson_date'); // Add this column
            $table->string('lesson_duration'); // Add this column
            $table->decimal('lesson_fee', 8, 2); // Add this column
            $table->string('lesson_id')->unique(); // Add this column for custom ID
            $table->foreignId('teacher_id')->constrained()->onDelete('cascade'); // Foreign key to teachers
            $table->foreignId('subject_id')->constrained()->onDelete('cascade'); // Foreign key to subjects
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('lessons', function (Blueprint $table) {
            //
        });
    }
};
