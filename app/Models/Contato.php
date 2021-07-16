<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;
    protected $fillable = ['nome', 'email', 'motivo_contato', 'mensagem'];

    public function motivo_contato_texto()
    {
        return $this->hasOne(MotivoContato::class, 'id', 'motivo_contato');
    }
}
