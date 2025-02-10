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
        Schema::table('entradas', function (Blueprint $table) {
            $table->unsignedBigInteger('id_tipocobranca')->nullable()->after('id');
            $table->unsignedBigInteger('id_planopagamento')->nullable()->after('id_tipocobranca');

            $table->foreign('id_tipocobranca')->references('id')->on('tipocobranca')->onDelete('set null');
            $table->foreign('id_planopagamento')->references('id')->on('planopagamento')->onDelete('set null');
        });
    }

    public function down() {
        Schema::table('entradas', function (Blueprint $table) {
            $table->dropForeign(['id_tipocobranca']);
            $table->dropForeign(['id_planopagamento']);
            $table->dropColumn(['id_tipocobranca', 'id_planopagamento']);
        });
    }
};
