<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanoPagamento extends Model
{
    use HasFactory;

    protected $table = 'planopagamento';

    protected $fillable = [
        'descricao',
        'quantidade_parcelas',
        'juros',
        'id_licenca'
    ];

    public function contasPagar()
    {
        return $this->hasMany(ContasPagar::class, 'id_planopagamento');
    }

    public function licenca()
    {
        return $this->belongsTo(Licenca::class, 'id_licenca');
    }

    public function entrada()
    {
        return $this->hasMany(Entrada::class, 'id_planopagamento');
    }
}
