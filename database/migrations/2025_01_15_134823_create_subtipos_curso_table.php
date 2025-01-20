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
        Schema::create('subtipos_curso', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_curso_id')->constrained('tipos_curso')->onDelete('cascade');
            $table->string('nome');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('subtipos_curso');
    }
};
