<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $table = 'entradas';

    protected $fillable = ['empresa_id', 'produto_id', 'quantidade', 'data_entrada','id_tipoentrada', 'id_pessoa', 'status'];

    // Relacionamento com Empresa
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    // Relacionamento com Produto
    public function produto()
    {
        return $this->belongsTo(Produto::class);
    }
    
    public function produtos()
    {
        return $this->hasMany(Entradaproduto::class);
    }

    public function tipoEntrada()
    {
        return $this->belongsTo(TipoEntrada::class, 'id_tipoentrada');
    }

    public function pessoa()
    {
        return $this->belongsTo(Pessoa::class, 'id_pessoa');
    }
}
