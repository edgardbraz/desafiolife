<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $fillable = [
        'nome', 
        'cpf', 
        'email', 
        'data_nasc',
        'nacionalidade'
    ];

    public function setDataNascAttribute($value)
    {
        $this->attributes['data_nasc'] = date('Y-m-d', strtotime($value));
    }

    public function getDataNascAttribute($value)
    {
        return date('d-m-Y', strtotime($value));
    }
}
