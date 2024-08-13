<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('enfrentamientos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('jugador1_id')->constrained('jugadors');
            $table->foreignId('jugador2_id')->constrained('jugadors');
            $table->foreignId('ganador_id')->nullable()->constrained('jugadors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enfrentamientos');
    }
};
