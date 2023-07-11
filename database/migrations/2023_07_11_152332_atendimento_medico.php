<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AtendimentoMedico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimento_medico', function (Blueprint $table) {
            $table->id();
            $table->foreignId('beneficiario_id')->constrained('beneficiario');
            $table->foreignId('especialidade_id')->constrained('especialidade');
            $table->foreignId('medico_id')->constrained('medico');
            $table->foreignId('local_id')->constrained('local_atendimento');
            $table->foreignId('procedimento_id')->constrained('procedimento');
            $table->dateTime('data');
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
        Schema::dropIfExists('atendimento_medico');
    }
}
