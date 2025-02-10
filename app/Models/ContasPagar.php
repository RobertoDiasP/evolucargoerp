<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContasPagar extends Model
{
    use HasFactory;
    protected $table = 'contaspagar';

    protected $fillable = [
        'id_pessoa',
        'id_entrada',
        'numero_parcela',
        'valor',
        'data_vencimento',
        'data_pagamento',
        'status',
        'observacao',
        'id_planopagamento',
        'id_tipocobranca'
    ];

    /**
     * Relacionamento com a tabela `pessoas`
     */
    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'id_pessoa');
    }

    /**
     * Relacionamento com a tabela `entradas`
     */
    public function entrada()
    {
        return $this->belongsTo(Entrada::class, 'id_entrada');
    }

    public function planoPagamento()
    {
        return $this->belongsTo(PlanoPagamento::class, 'id_planopagamento');
    }

    public function tipoCobranca()
    {
        return $this->belongsTo(TipoCobranca::class, 'id_tipocobranca');
    }
}
