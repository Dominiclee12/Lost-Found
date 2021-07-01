<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFoundsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('founds', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('category_id');
            $table->string('brand')->nullable();
            $table->string('color')->nullable();
            $table->string('location');
            $table->date('date');
            $table->string('description');
            $table->string('found_by')->nullable();
            $table->string('found_contact')->nullable();
            $table->string('status')->nullable();
            // $table->string('image');
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
        Schema::dropIfExists('founds');
    }
}
