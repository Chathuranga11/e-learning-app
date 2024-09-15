<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('lessons', function (Blueprint $table) {
        $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('lessons', function (Blueprint $table) {
        $table->dropForeign(['subject_id']);
    });
}

};
