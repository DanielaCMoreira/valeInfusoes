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
    
    public function medicos()
    {
        return $this->hasMany(Medico::class,'id', 'medico_id');
    }
    
    public function especialidades()
    {
        return $this->hasMany(Especialidade::class,'id', 'especialidade_id');
    }
    
    public function local()
    {
        return $this->hasMany(LocalAtendimento::class,'id', 'local_id');
    }
    
    public function beneficiario()
    {
        return $this->hasMany(Beneficiario::class,'id', 'beneficiario_id');
    }
    
    public function procedimento()
    {
        return $this->hasMany(Procedimento::class,'id', 'procedimento_id');
    }
}
