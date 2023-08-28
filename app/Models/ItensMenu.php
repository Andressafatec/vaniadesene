<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ItensMenu extends Model
{
	protected $table = 'menu';
	protected $fillable = ['id',
	'titulo',
	'slug_menu',
	'ordem',
	'id_conteudo',
	'id_categoria',
	'status',
	'ocultar_texto',
	'icone_texto',
	'class_custom',
	'id_custom',
	'id_menu_pai',
	'tipo_menu_id',
	'link_custom',
	'locale',
	'tipo_produtos',
	'menu_produtos',
	'media_id'
	
];
  public function media(){
            return $this->hasOne(Media::class,'id','media_id');
    }
public function scopeLocale($query){
	$locale = app()->getLocale();
	return $query->where('locale', $locale);
}
public function parent(){
	return $this->hasOne(ItensMenu::class, 'id','id_menu_pai');
}
public function children(){
	return $this->hasMany(ItensMenu::class, 'id_menu_pai')->orderBy('ordem','asc');
}
public function content(){
	return $this->hasOne(Contents::class,'id','id_conteudo');
}

public function conteudos(){
	return $this->hasMany(MenuAssociacao::class, 'id_item_menu','id');
 }


}
