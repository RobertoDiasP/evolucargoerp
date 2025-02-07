<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoEntrada extends Model
{
    use HasFactory;
    protected $table = 'tipoentrada';

    protected $fillable = ['descricao', 'id_licenca'];

    /**
     * Relacionamento com a tabela 'entrada' (1 tipo de entrada pode estar em várias entradas).
     */
    public function entradas()
    {
        return $this->hasMany(Entrada::class, 'id_tipoentrada');
    }

    public function licenca()
    {
        return $this->belongsTo(Licenca::class, 'id_licenca');
    }
}
