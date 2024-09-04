<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RecreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // First drop the table if it exists
        Schema::dropIfExists('admins');

        // Recreate the 'admins' table
        Schema::create('admins', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique(); // Unique Email
            $table->string('mobile'); // WhatsApp Mobile Number
            $table->string('password'); // Hashed Password
            $table->string('address');
            $table->string('city');
            $table->boolean('is_active')->default(false); // Set default to false (disabled)
            $table->timestamps(); // Created at, Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the 'admins' table if the migration is rolled back
        Schema::dropIfExists('admins');
    }
}
