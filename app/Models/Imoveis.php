<?php

namespace App\Models;

use App\Models\Fotos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imoveis extends Model
{
    use HasFactory;

    protected $table = 'vaniadesene_rw940.imoveis';

    protected $fillable = [
		'anuncio',
		'titulo',
		'tipoanuncio',
		'valor',
		'bairro',
		'cidade',
		'uf',
		'contrato',
		'detalhes',
		'empresa',
		'finalidade',
		'grupo',
		'referencia',
        'referencia_original',
		'regiao',
		'tipo'
    ];
  
    public function caracteristica(){
        return $this->hasMany(Caracteristica::class, 'imovel_id');
    }

	public function fotos(){
        return $this->hasMany(Fotos::class, 'imovel_id');
    }
}