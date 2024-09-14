<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('mobile');
            $table->string('password');
            $table->string('city');
            $table->boolean('is_active')->default(false);
            $table->unsignedBigInteger('subject_id'); // Foreign key to subjects table
            $table->timestamps();

            $table->foreign('subject_id')->references('id')->on('subjects'); // Foreign key constraint
        });
    }

    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
