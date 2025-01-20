<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'telefone','user_id', 'data_nascimento'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

