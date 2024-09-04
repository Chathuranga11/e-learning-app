<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsActiveToUsersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add 'is_active' column to 'admins' table
        Schema::table('admin', function (Blueprint $table) {
            $table->boolean('is_active')->default(false);  // False means disabled
        });

        // Add 'is_active' column to 'teachers' table
        Schema::table('teachers', function (Blueprint $table) {
            $table->boolean('is_active')->default(false);  // False means disabled
        });

        // Add 'is_active' column to 'students' table
        Schema::table('students', function (Blueprint $table) {
            $table->boolean('is_active')->default(true);  // True means active
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Remove 'is_active' column from 'admins' table
        Schema::table('admin', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });

        // Remove 'is_active' column from 'teachers' table
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });

        // Remove 'is_active' column from 'students' table
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }
}
