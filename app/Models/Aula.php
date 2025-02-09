<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aula extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'conteudo', 'duracao', 'curso_id'];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
