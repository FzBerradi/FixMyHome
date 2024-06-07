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
        Schema::create('pa_ses', function (Blueprint $table) {
            $table->unsignedBigInteger('Partenaire_ID');
            $table->unsignedBigInteger('Service_ID');
            $table->timestamps();
            $table->foreign('Partenaire_ID')->references('id')->on('partenaires')->onDelete('cascade');
            $table->foreign('Service_ID')->references('id')->on('services')->onDelete('cascade');


            $table->primary(['Partenaire_ID', 'Service_ID']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pa_ses');
    }
};
