<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedimento extends Model
{
    use HasFactory;

    protected $table = 'procedimento';

    protected $primaryKey = 'id';

    protected $fillable = ['id','descricao_procedimento','tipo_procedimento','created_at','updated_at'];
}
