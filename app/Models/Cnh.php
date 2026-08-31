<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cnh extends Model
{
    //
    protected $fillable = [
        'numero',
        'categoria',
        'validade',
        'orgao_emissor',
        'funcionario_id'
    ];

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class);
    }
}
