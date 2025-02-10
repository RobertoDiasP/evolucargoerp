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
        Schema::table('tipocobranca', function (Blueprint $table) {
            $table->unsignedBigInteger('id_licenca')->after('id')->nullable();
            $table->foreign('id_licenca')->references('id')->on('licencas')->onDelete('cascade');
        });

        Schema::table('planopagamento', function (Blueprint $table) {
            $table->unsignedBigInteger('id_licenca')->after('id')->nullable();
            $table->foreign('id_licenca')->references('id')->on('licencas')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('tipocobranca', function (Blueprint $table) {
            $table->dropForeign(['id_licenca']);
            $table->dropColumn('id_licenca');
        });

        Schema::table('planopagamento', function (Blueprint $table) {
            $table->dropForeign(['id_licenca']);
            $table->dropColumn('id_licenca');
        });
    }
};
