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
        Schema::create('configurations', function (Blueprint $table) {
            $table->id();
            $table->string('app_name')->default('STAFFPAY'); // Nom de l'application
            $table->enum('language',['english', 'french'])->default('english'); // Langue de l'application
            $table->string('logo')->nullable(); // Logo de l'application
            $table->integer('paiement_date')->default(3); // Date de paiement
            $table->integer('state_sheet_date')->default(30); // Date d'envoi de la fiche d'état
            $table->integer('supervised_work_fee')->default(900); // Honoraires de travail supervisé
            $table->integer('monitoring_fee')->default(3000); //Honoraires de surveillance
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configurations');
    }
};
