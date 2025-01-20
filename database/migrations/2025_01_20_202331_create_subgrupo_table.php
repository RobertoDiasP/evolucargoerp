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
        Schema::create('subgrupos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grupo_id')->nullable();
            $table->string('nome')->notNullable();
            $table->timestamps();

            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('subgrupos');
    }
};
