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
        Schema::table('projects', function (Blueprint $table) {
            //creo il campo nella tabella
            $table->unsignedBigInteger('type_id')
                ->nullable()
                ->after('id');
            //creo la chiave esterna
            $table->foreign('type_id')
                ->references('id')
                ->on('types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            // elimino relazione fra tabelle
            $table->dropForeign('projects_type_id_foreign');

            // elimino la colonna
            $table->dropColumn('type_id');
        });
    }
};
