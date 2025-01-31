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
        Schema::table('empresas', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(); // Pode ser nulo caso a empresa não tenha um usuário atribuído
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null'); // Apaga o user_id ao deletar o usuário
        });
    }

    /**
     * Reverte a alteração, removendo o campo 'user_id' da tabela 'empresas'.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('empresas', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });
    }
};
