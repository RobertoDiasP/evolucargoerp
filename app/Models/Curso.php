<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;
    protected $table = 'cursos';
    protected $fillable = ['nome', 'descricao', 'preco', 'subtipo_curso_id', 'professor_id'];

    public function subtipoCurso()
    {
        return $this->belongsTo(SubtipoCurso::class);
    }

    public function professor()
    {
        return $this->belongsTo(Professor::class);
    }
}
