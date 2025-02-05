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
        Schema::create('licencas', function (Blueprint $table) {
            $table->id();
            $table->string('nome'); // Nome da licença
            $table->date('data_expiracao')->nullable(); // Data de expiração da licença
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('licencas');
    }
};
