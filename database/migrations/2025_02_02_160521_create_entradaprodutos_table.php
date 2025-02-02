<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('entradaprodutos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('entrada_id')->constrained('entradas')->onDelete('cascade');
            $table->foreignId('produto_id')->constrained('produtos')->onDelete('cascade');
            $table->integer('quantidade');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('entradaprodutos');
    }
};
