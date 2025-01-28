<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

     // Nome da tabela
     protected $table = 'produtos';

     // Campos preenchíveis
     protected $fillable = [
         'codigo_produto',
         'sku',
         'descricao_resumida',
         'descricao_completa',
         'codigogrupo',
         'codigosubgrupo',
         'codigomarca',
         'imobilizado',
         'peso_bruto',
         'peso_liquido',
         'altura',
         'comprimento',
         'largura',
         'fator_preco',
         'status',
         'data_criacao',
         'codigobarras',
         'csosn',
         'cst_pis',
         'cst_cofins',
         'aliq_ipi',
         'cst_ipi',
         'cfop',
     ];
 
     // Relacionamentos
     public function grupo()
     {
         return $this->belongsTo(Grupo::class, 'codigogrupo');
     }
 
     public function subgrupo()
     {
         return $this->belongsTo(Subgrupo::class, 'codigosubgrupo');
     }
 
    
 
     public function marca()
     {
         return $this->belongsTo(Marca::class, 'codigomarca');
     }

}
