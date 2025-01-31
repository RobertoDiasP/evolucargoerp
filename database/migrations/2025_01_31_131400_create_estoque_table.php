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
        Schema::create('estoque', function (Blueprint $table) {
            $table->id();
            $table->foreignId('empresa_id')->constrained('empresas')->onDelete('cascade');
            $table->foreignId('produto_id')->constrained('produtos')->onDelete('cascade');
            $table->integer('quantidade')->default(0);
            $table->unique(['empresa_id', 'produto_id']); // Garante um único registro por empresa e produto
            $table->timestamps();
        });
    }

    /**
     * Reverte a Migration (Rollback)
     */
    public function down()
    {
        Schema::dropIfExists('estoque');
    }
};
