<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enderecos extends Model
{
    protected $table = "enderecos";

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [

        'id',
        'id_user',
        'cep',
        'logradouro',
        'bairro',
        'complemento',
        'numero',
        'uf',
        'localidade'
    ];
}
