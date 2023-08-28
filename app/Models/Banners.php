<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class Banners extends Model
{



    protected $table = 'banners';

    protected $fillable = [
        'locale', 
        'nome',
        'media_id',
        'media_mobile_id',
        'titulo',
        'exibir_tilulo',
        'posicao',
        'link_full',
        'texto',
        'label_link',
        'link',
        'style_link',
        'style_bg',
        'style_texto',
        'style_titulo',
        'overlayer',
        'img_fundo',
        'status',
        'ordem'
    ];


	 public function media(){
            return $this->hasOne(Media::class,'id','media_id');
    }

    public function mediaMobile(){
            return $this->hasOne(Media::class,'id','media_mobile_id');
    }

    public function scopeLocale($query){
        $locale = app()->getLocale();
        return $query->where('locale', $locale);
    }

}

