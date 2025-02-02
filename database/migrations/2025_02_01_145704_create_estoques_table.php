<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('estoques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->constrained('empresas')->onDelete('cascade');
            $table->foreignId('produto_id')->constrained('produtos')->onDelete('cascade');
            $table->integer('quantidade')->default(0);
            $table->unique(['empresa_id', 'produto_id']); // Garante que um produto não se repita na empresa
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('estoques');
    }
    
};
