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
        Schema::create('tipoentrada', function (Blueprint $table) {
            $table->id();
            $table->string('descricao')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverte a criação da tabela 'tipoentrada'.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipoentrada');
    }
};
