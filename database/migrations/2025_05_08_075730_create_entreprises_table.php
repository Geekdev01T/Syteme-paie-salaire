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
        Schema::create('entreprises', function (Blueprint $table) {
            $table->id();
            $table->string('name',255)->nullable();
            $table->text('slogan')->nullable();
            $table->enum('type_organisation', ['etablissement_scolaire', 'entreprise', 'association', 'universite', 'gouvernement', 'ong'])->default('etablissement_scolaire');
            $table->string('logo')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone1')->default('+236 682 779 324');
            $table->string('phone2')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entreprises');
    }
};
