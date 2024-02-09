<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('levels', function (Blueprint $table) {
            $table->string('name'); 
            $table->text('description'); 
            $table->unsignedBigInteger('group_id'); 
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade'); // Définit la contrainte de clé étrangère
        });
    }

    public function down()
    {
        Schema::table('levels', function (Blueprint $table) {
            $table->dropForeign(['group_id']); // Supprime la contrainte de clé étrangère
            $table->dropColumn(['name', 'description', 'group_id']); // Supprime les colonnes
        });
    }
};
