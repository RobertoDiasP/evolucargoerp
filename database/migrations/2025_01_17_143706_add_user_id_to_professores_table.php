<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('professores', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable(); // Cria o campo user_id
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // Define a chave estrangeira
        });
    }

    public function down()
    {
        Schema::table('professores', function (Blueprint $table) {
            $table->dropForeign(['user_id']); // Remove a chave estrangeira
            $table->dropColumn('user_id');   // Remove o campo user_id
        });
    }
};
