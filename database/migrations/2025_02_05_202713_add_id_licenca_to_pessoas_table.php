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
        Schema::table('pessoas', function (Blueprint $table) {
            $table->foreignId('id_licenca')->nullable()->constrained('licencas')->onDelete('set null');
        });
    }

    public function down() {
        Schema::table('pessoas', function (Blueprint $table) {
            $table->dropForeign(['id_licenca']);
            $table->dropColumn('id_licenca');
        });
    }
};
