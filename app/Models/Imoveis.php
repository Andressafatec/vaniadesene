<?php

namespace App\Models;

use App\Models\Fotos;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imoveis extends Model
{
    use HasFactory;

    protected $fillable = [
			'id',
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
			'tipo',
			'promocao',
			'corretor_id',
			'latitude',
			'longitude',
			'rua',
			'cep',
			'regicao',
    ];
  
    public function caracteristicas(){
        return $this->hasMany(Caracteristica::class, 'imovel_id');
    }
	public function caracteristicasPrincipais($pref = null){
		
        $query = $this->caracteristicas->where('pref',$pref)->first();
	
		return $query;
    }
	public function edificio(){
        return $this->hasMany(Edificio::class, 'imovel_id');
    }
    public function corretor(){
        return $this->hasOne(Corretor::class, 'id','corretor_id');
    }

	public function fotos(){
        return $this->hasMany(Fotos::class, 'imovel_id')->orderBy('ordem','asc');
    }
    public function miniatura(){
    	if($this->fotos->count() > 0){
    		return $this->fotos->where('ordem',1)->first()->url;
    	}else{
			return asset('min/img/default.jpg');
		}
    }
}