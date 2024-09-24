<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropPurchasesTable extends Migration
{
    public function up()
    {
        Schema::dropIfExists('purchases');  // Drop the purchases table
    }

    public function down()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();
            $table->string('purchase_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('lesson_id');
            $table->timestamps();
        });
    }
}
