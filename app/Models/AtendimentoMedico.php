<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AtendimentoMedico extends Model
{
    use HasFactory;
    
    protected $table = 'atendimento_medico';

    protected $primaryKey = 'id';

    protected $fillable = ['id','beneficiario_id','especialidade_id','medico_id','local_id','procedimento_id','data','created_at','updated_at'];
}
