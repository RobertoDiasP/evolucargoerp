<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'curso_id', 'data_matricula'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
