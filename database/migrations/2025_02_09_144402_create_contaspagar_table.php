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
        Schema::create('contaspagar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pessoa');
            $table->unsignedBigInteger('id_entrada')->nullable();
            $table->integer('numero_parcela');
            $table->decimal('valor', 10, 2);
            $table->date('data_vencimento');
            $table->date('data_pagamento')->nullable();
            $table->string('status', 20)->default('pendente');
            $table->text('observacao')->nullable();
            $table->timestamps();

            // Chaves estrangeiras
            $table->foreign('id_pessoa')->references('id')->on('pessoas')->onDelete('cascade');
            $table->foreign('id_entrada')->references('id')->on('entradas')->onDelete('set null');
        });
    }

    public function down() {
        Schema::dropIfExists('contaspagar');
    }
};
