<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('jugadors', function (Blueprint $table) {
            $table->integer('fuerza')->nullable();
            $table->integer('velocidad')->nullable();
            $table->integer('tiempo_reaccion')->nullable();
        });
    }

    public function down()
    {
        Schema::table('jugadors', function (Blueprint $table) {
            $table->dropColumn(['fuerza', 'velocidad', 'tiempo_reaccion']);
        });
    }
};

