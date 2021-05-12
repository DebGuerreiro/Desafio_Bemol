<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contatos extends Model
{
    protected $table = "contatos";

    public $timestamps = false;

    protected $fillable = [

        'id',
        'id_user',
        'ddd',
        'tel_resid',
        'tel_cel'    
    ];
}
