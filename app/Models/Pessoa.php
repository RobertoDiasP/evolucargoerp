<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    protected $table = 'pessoas';

    protected $fillable = ['nome', 'tipo', 'documento', 'telefone', 'email', 'id_licenca', 'cep', 'logradouro', 'complemento', 'unidade', 'bairro', 'localidade', 'uf', 'estado'];

    public function relacionamentos()
    {
        return $this->hasMany(Relacionamento::class);
    }

    public function licenca()
    {
        return $this->belongsTo(Licenca::class, 'id_licenca');
    }

    public function entradas()
    {
        return $this->hasMany(Entrada::class, 'id_pessoa');
    }

    public function contasPagar()
    {
        return $this->hasMany(ContasPagar::class, 'id_pessoa');
    }
}
