<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licenca extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'data_expiracao'];

    public function pessoas()
    {
        return $this->hasMany(Pessoa::class, 'id_licenca');
    }

    public function relacionamentos()
    {
        return $this->hasMany(Relacionamento::class, 'id_licenca');
    }

    public function tipoEntradas()
    {
        return $this->hasMany(TipoEntrada::class, 'id_licenca');
    }

    public function tiposCobranca()
    {
        return $this->hasMany(TipoCobranca::class, 'id_licenca');
    }

    public function planosPagamento()
    {
        return $this->hasMany(PlanoPagamento::class, 'id_licenca');
    }
}
