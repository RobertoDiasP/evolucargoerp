<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relacionamento extends Model
{
    use HasFactory;

    protected $table = 'relacionamentos';
    protected $fillable = ['tipo_relacionamento', 'id_licenca'];


    public function licenca()
    {
        return $this->belongsTo(Licenca::class, 'id_licenca');
    }

}
