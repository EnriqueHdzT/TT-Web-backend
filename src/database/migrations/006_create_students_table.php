<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->uuid('id')->index()->primary();
            $table->string('lastname');
            $table->string('second_lastname')->nullable();
            $table->string('name');
            $table->string('student_id', 10);
            $table->enum('career', ['ISW', 'LCD', 'IIA'])->default('ISW');
            $table->integer('curriculum')->default(2020);
            $table->string('altern_email')->nullable();
            $table->string('phone_number', 15)->nullable();
            $table->timestamps();

            $table->foreign('id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
