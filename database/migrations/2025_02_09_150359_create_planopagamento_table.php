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
        Schema::create('planopagamento', function (Blueprint $table) {
            $table->id();
            $table->string('descricao', 100);
            $table->integer('quantidade_parcelas');
            $table->decimal('juros', 5, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('planopagamento');
    }
};
