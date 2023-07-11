<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    use HasFactory;
    
    protected $table = 'beneficiario';
    
    protected $primaryKey = 'id';

    protected $fillable = ['id','nome','data_nascimento','sexo','created_at','updated_at'];
}
