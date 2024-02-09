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
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Ajoute la colonne 'name'
            $table->text('description'); // Ajoute la colonne 'description'
            $table->foreignId('group_id')->constrained()->onDelete('cascade'); // Ajoute la colonne 'group_id' avec une contrainte de clé étrangère
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('levels', function (Blueprint $table) {
            $table->dropForeign(['group_id']); // Supprime la contrainte de clé étrangère
            $table->dropColumn(['name', 'description', 'group_id']); // Supprime les colonnes
        });
    }
};
