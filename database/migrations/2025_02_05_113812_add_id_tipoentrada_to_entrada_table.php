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
            $table->unsignedBigInteger('id_tipoentrada')->after('id')->nullable();
            $table->foreign('id_tipoentrada')->references('id')->on('tipoentrada')->onDelete('set null');
        });
    }

    /**
     * Reverte a adição da chave estrangeira 'id_tipoentrada'.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entradas', function (Blueprint $table) {
            $table->dropForeign(['id_tipoentrada']);
            $table->dropColumn('id_tipoentrada');
        });
    }
};
