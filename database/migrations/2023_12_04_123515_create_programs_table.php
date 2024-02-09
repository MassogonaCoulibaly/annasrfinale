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
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status', ['en cours', 'terminé', 'annulé'])->default('en cours');
            $table->dateTime('start_date')->nullable();
            $table->time('start_time')->nullable(); 

            $table->foreignId('course_id')
                ->nullable()
                ->constrained('courses')
                ->onDelete('cascade')
                ->onUpdate('cascade');


            $table->foreignId('exercise_id')
                ->nullable()
                ->constrained('exercises')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};
