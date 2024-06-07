<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Partenaire_ID');
            $table->unsignedBigInteger('Service_ID');
            $table->unsignedBigInteger('Client_ID');
            $table->date('Date');
            $table->integer('Duree');
            $table->float('Prix');
            $table->boolean('Status');
            $table->string('Commentaire_Client');
            $table->integer('Note_Client');
            $table->string('Commentaire_Partenaire');
            $table->string('Inf');
            // Relations:
            $table->foreign('Partenaire_ID')->references('id')->on('partenaires')->onDelete('cascade');
            $table->foreign('Service_ID')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('Client_ID')->references('id')->on('clients')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
