<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorretoresImoveis extends Model
{
    use HasFactory;

    protected $table = 'corretores_imoveis';

    protected $fillable = [
		'imovel_id',
		'corretor_id'
    ];
}