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
        Schema::create('etat_retards', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('hour');
            $table->text('comment')->nullable();
            $table->foreignId('employer_id')->constrained('employers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('etat_retards');
    }
};
