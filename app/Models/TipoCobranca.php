<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCobranca extends Model
{
    use HasFactory;

    protected $table = 'tipocobranca';

    protected $fillable = [
        'descricao',
        'id_licenca'
    ];

    public function contasPagar()
    {
        return $this->hasMany(ContasPagar::class, 'id_tipocobranca');
    }

    public function licenca()
    {
        return $this->belongsTo(Licenca::class, 'id_licenca');
    }

    public function entrada()
    {
        return $this->hasMany(Entrada::class, 'id_tipocobranca');
    }
}
