<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('losts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category_id');
            // $table->string('brand');
            $table->string('color');
            $table->string('location');
            $table->date('date');
            //image
            $table->string('status')->default('Unsolve');
            $table->string('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('losts');
    }
}
