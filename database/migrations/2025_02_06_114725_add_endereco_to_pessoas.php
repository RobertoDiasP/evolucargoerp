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
        Schema::table('pessoas', function (Blueprint $table) {
            $table->string('cep', 10)->nullable();
            $table->string('logradouro')->nullable();
            $table->string('complemento')->nullable();
            $table->string('unidade')->nullable();
            $table->string('bairro')->nullable();
            $table->string('localidade')->nullable();
            $table->string('uf', 2)->nullable();
            $table->string('estado')->nullable();
        });
    }

    public function down(): void {
        Schema::table('pessoas', function (Blueprint $table) {
            $table->dropColumn(['cep', 'logradouro', 'complemento', 'unidade', 'bairro', 'localidade', 'uf', 'estado']);
        });
    }
};
