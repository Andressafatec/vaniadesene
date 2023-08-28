<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
    use HasFactory;

	protected $table = 'vaniadesene_rw940.caracteristicas';

    protected $fillable = [
		'imovel_id',
		'pref',
		'label',
		'valor'
		
	];

}
