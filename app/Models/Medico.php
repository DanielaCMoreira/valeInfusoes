<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $table = 'medico';

    protected $primaryKey = 'id';

    protected $fillable = ['id','nome','crm','data_nascimento','created_at','updated_at'];

    public function localAtendimento() 
    {
        return $this->HasOne(LocalAtendimento::class);
    }
}
