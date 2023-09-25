<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corretores extends Model
{
    use HasFactory;

    protected $table = 'corretores';

    protected $fillable = [
		'id_sistemas',
		'nome',
		'funcao',
		'loja',
		'telefone',
		'creci',
		'email',
		'foto'
    ];
}