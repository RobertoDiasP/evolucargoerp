<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $table = 'entradas';

    protected $fillable = ['empresa_id', 'produto_id', 'quantidade', 'data_entrada'];

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
}
