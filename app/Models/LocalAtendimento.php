<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalAtendimento extends Model
{
    use HasFactory;
    
    protected $table = 'local_atendimento';

    protected $primaryKey = 'id';

    protected $fillable = ['id','endereco','medico_id','especialidade_id','created_at','updated_at'];

    public function medico()
    {
        return $this->belongsTo(Medico::class);
    }
}
