<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('lessons', function (Blueprint $table) {
            // Modify the teacher_id column to be a string
            $table->string('teacher_id')->change();
        });
    }

    public function down()
    {
        Schema::table('lessons', function (Blueprint $table) {
            // Revert the change if needed
            $table->unsignedBigInteger('teacher_id')->change();
        });
    }
};
