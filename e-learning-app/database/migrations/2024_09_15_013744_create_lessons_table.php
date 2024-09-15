<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonsTable extends Migration
{
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id(); // This will auto-generate the primary key with standard incrementing IDs
            $table->string('name');
            $table->text('description')->nullable();
            $table->date('date');
            $table->string('time');
            $table->integer('duration');
            $table->decimal('fee', 8, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('lessons');
    }
}

