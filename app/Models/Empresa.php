<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
      // Nome da tabela no banco de dados
      protected $table = 'empresas';

      // Campos permitidos para inserção em massa (Mass Assignment)
      protected $fillable = [
          'nome',
          'cnpj',
          'user_id',
      ];
      
      public function user()
    {
        return $this->belongsTo(User::class); // Uma empresa pertence a um usuário
    }
      // Definir que os timestamps serão gerenciados pelo Laravel
      public $timestamps = true;
}
