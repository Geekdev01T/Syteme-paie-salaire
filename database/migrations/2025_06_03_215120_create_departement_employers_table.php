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
        Schema::create('departement_employers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('departement_id')->constrained()->onDelete('cascade');
            $table->foreignId('employer_id')->constrained()->onDelete('cascade');
            $table->unique(['departement_id', 'employer_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departement_employers');
    }
};
