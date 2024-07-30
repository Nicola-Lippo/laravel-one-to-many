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
        Schema::create('project_technology', function (Blueprint $table) {
            $table->id();
            /* foreign project 
            constrained = se non ce relazione non ce riga
            cascadeOnDelete = se elimino un elemnto vado ad eliminare le righe nella tabella
            relazionale e non il dato nella tabella a cui è collegato trammite la tabella relazionale
            */
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            //foreign technology
            $table->foreignId('technology_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_technology');
    }
};
