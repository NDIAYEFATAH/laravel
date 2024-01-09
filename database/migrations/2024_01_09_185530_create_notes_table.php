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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->decimal('valeur')->nullable(false);

            $table->unsignedBigInteger('type_id');

            $table->foreign('type_id')->references('id')->on('sys_type_notes');


            $table->foreignId('apprenant_id')->constrained();

            $table->foreignId('matiere_id')->constrained();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
