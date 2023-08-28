<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Corretor extends Model
{
    use HasFactory;

    protected $table = 'vaniadesene_rw940.corretor';

    protected $fillable = [
		'nome',
		'telefone',
		'creci',
		'email',
		'foto'
    ];
}