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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id(); // Cria a coluna 'id' como chave primária e auto incremento
            $table->string('nome', 255); // Nome da empresa (obrigatório)
            $table->string('cnpj', 20)->unique(); // CNPJ (único e obrigatório)
            $table->timestamps(); // Cria 'created_at' e 'updated_at' automaticamente
        });
    }

    public function down()
    {
        Schema::dropIfExists('empresas');
    }
};
