<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_id')->unique();
            $table->unsignedBigInteger('student_id');
            $table->string('lesson_id');  // Lesson ID as string

            $table->timestamps();

            // Foreign key to students table
            $table->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onDelete('cascade');

            // Foreign key to lessons table
            $table->foreign('lesson_id')
                ->references('lesson_id')  // Referencing the lesson_id in lessons
                ->on('lessons')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchases');
    }
}
