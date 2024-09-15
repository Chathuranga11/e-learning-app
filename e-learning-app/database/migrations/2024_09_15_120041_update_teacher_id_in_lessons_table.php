<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('lessons', function (Blueprint $table) {
        // Ensure the teacher_id column matches the type in the teachers table
        $table->string('teacher_id')->change();
        $table->foreign('teacher_id')->references('teacher_id')->on('teachers')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('lessons', function (Blueprint $table) {
        $table->dropForeign(['teacher_id']);
    });
}

};
