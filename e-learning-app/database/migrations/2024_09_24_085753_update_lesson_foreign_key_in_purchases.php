<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLessonForeignKeyInPurchases extends Migration
{
    public function up()
    {
        Schema::table('purchases', function (Blueprint $table) {
            // Drop the existing foreign key and lesson_id column
            $table->dropForeign(['lesson_id']);
            $table->dropColumn('lesson_id');

            // Add a new lesson_id column that matches lesson_id in the lessons table
            $table->string('lesson_id');
            $table->foreign('lesson_id')->references('lesson_id')->on('lessons')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('purchases', function (Blueprint $table) {
            // Roll back the changes if needed
            $table->dropForeign(['lesson_id']);
            $table->dropColumn('lesson_id');

            // Re-add the old lesson_id column if necessary
            $table->unsignedBigInteger('lesson_id');
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
        });
    }
}
