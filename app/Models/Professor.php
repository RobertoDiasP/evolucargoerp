<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    use HasFactory;
    protected $table = 'professores';

    protected $fillable = ['nome', 'email', 'telefone','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class); // Define o relacionamento
    }
}
