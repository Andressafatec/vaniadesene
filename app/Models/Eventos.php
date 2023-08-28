<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Eventos extends Model
{



    protected $table = 'eventos';
    protected $dates = ['data'];
  

    protected $fillable = [
        'id_content', 
        'data',
        'hora',
        'local',
        'qtd_vagas',
        'ativar_inscricao',
        'desativar_formulario',
        'valor_socio',
        'valor_nao_socio',
        'valor_mesa_socio',
        'valor_mesa_nao_socio',
        'valor_meia_nao_socio',
        'gratuito',
        'email_responsavel',
        'reserva_mesas'
    ];
	
    public function content(){
        return $this->hasOne(Contents::class,'id','id_content');
    }
    public function inscricoes(){
        return $this->hasMany(Inscricoes::class,'id_evento','id');
    }
    public function totalInscritos(){
        $qtd = 0;
        foreach($this->inscricoes as $k => $v){
            $qtd += $v->itens->sum('quantidade');
        }
        return $qtd;
    }
    function convertNumber($value){
        $value = str_replace('.','',$value);
        $value = str_replace(',','.',$value);
        return $value;
    }
    public function setValorSocioAttribute($value)
    {
       
        $this->attributes['valor_socio'] = $this->convertNumber($value);
    }

    public function setValorNaoSocioAttribute($value)
    {
        $this->attributes['valor_nao_socio'] = $this->convertNumber($value);
    }
    
    public function setValorMesaSocioAttribute($value)
    {
        $this->attributes['valor_mesa_socio'] = $this->convertNumber($value);
    }
    public function setValorMesaNaoSocioAttribute($value)
    {
        $this->attributes['valor_mesa_nao_socio'] = $this->convertNumber($value);
    }
    public function setValorMeiaNaoSocioAttribute($value)
    {
        $this->attributes['valor_meia_nao_socio'] = $this->convertNumber($value);
    }

}

