<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    use HasFactory;
    protected $table = 'estoque';

    // Campos que podem ser preenchidos em massa (Mass Assignment)
    protected $fillable = [
        'empresa_id',
        'produto_id',
        'quantidade',
    ];

    /**
     * Relacionamento: Um estoque pertence a uma empresa.
     */
    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    /**
     * Relacionamento: Um estoque pertence a um produto.
     */
    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produto_id');
    }
}
