<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidade extends Model
{
    use HasFactory;
    
    protected $table = 'especialidade';
    
    protected $primaryKey = 'id';

    protected $fillable = ['id','especialidade','cbos','created_at','updated_at'];
    
    public function localAtendimento() 
    {
        return $this->belongsTo(LocalAtendimento::class);
    }
}
