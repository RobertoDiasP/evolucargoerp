<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relacionamento extends Model
{
    use HasFactory;
    protected $fillable = ['pessoa_id', 'tipo_relacionamento'];

    public function pessoa() {
        return $this->belongsTo(Pessoa::class);
    }

}
