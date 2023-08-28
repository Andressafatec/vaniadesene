<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fotos extends Model
{
    use HasFactory;

    protected $fillable = [
		'imovel_id',
		'ordem',
		'descricao',
		'alterada',
		'url',
		'arquivo'
		
	];

}
