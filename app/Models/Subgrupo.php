<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subgrupo extends Model
{
    use HasFactory;
    protected $fillable = [
        'grupo_id', // chave estrangeira do grupo
        'nome',     // nome do subgrupo
    ];

     public function grupo()
    {
        return $this->belongsTo(Grupo::class, 'grupo_id'); // grupo_id é a chave estrangeira
    }
}
