<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LocalAtendimento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_atendimento', function (Blueprint $table) {
            $table->id();
            $table->string('endereco');
            $table->foreignId('medico_id')->constrained('medico');
            $table->foreignId('especialidade_id')->constrained('especialidade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('local_atendimento');
    }
}
