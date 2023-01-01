<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamp('dob')->nullable();
            $table->string('breed')->nullable();
            $table->enum('gender', ['male', 'female', 'unknown'])->nullable();
            $table->string('species')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('chronic_disease')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('patients');
    }
};
