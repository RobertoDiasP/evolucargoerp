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
        Schema::table('entradas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pessoa')->nullable()->after('id'); // Adiciona o campo depois do 'id'
            $table->foreign('id_pessoa')->references('id')->on('pessoas')->onDelete('cascade'); // Cria a chave estrangeira
        });
    }

    public function down()
    {
        Schema::table('entradas', function (Blueprint $table) {
            $table->dropForeign(['id_pessoa']);
            $table->dropColumn('id_pessoa');
        });
    }
};
