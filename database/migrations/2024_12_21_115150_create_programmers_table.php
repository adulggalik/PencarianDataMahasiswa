<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('programmers', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Nama Programmer
        $table->string('email')->unique(); // Email Programmer
        $table->string('specialization'); // Keahlian Programmer
        $table->text('description')->nullable();
        $table->string('photo'); // Deskripsi Programmer
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programmers');
    }
};
