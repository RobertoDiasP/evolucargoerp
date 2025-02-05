<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up() {
        Schema::create('relacionamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pessoa_id')->constrained('pessoas')->onDelete('cascade');
            $table->string('tipo_relacionamento'); // Exemplo: 'Fornecedor', 'Cliente', 'Sócio'
            $table->timestamps();

            $table->unique(['pessoa_id']); // Garante que cada pessoa tenha apenas um relacionamento por empresa
        });
    }

    public function down() {
        Schema::dropIfExists('relacionamentos');
    }
};
