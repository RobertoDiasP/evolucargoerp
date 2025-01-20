<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubtipoCurso extends Model
{
    use HasFactory;
    protected $table = 'subtipos_curso';

    protected $fillable = ['nome', 'tipo_curso_id'];

    public function tipoCurso()
    {
        return $this->belongsTo(TipoCurso::class);
    }
}
