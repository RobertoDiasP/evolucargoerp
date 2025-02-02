<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saida extends Model
{
    use HasFactory;
    protected $table = 'saidas';

    protected $fillable = ['empresa_id', 'produto_id', 'quantidade', 'data_saida'];

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
}
