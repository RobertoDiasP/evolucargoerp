<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'tipo', 'documento', 'telefone', 'email','id_licenca'];

    public function relacionamentos() {
        return $this->hasMany(Relacionamento::class);
    }

    public function licenca() {
        return $this->belongsTo(Licenca::class, 'id_licenca');
    }
}
