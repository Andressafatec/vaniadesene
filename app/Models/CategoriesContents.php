<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
class CategoriesContents extends Model
{
    protected $table = 'categorias_conteudos';
    protected $fillable = ['id','id_conteudo','id_categoria'];
    public function category(){
    	return $this->hasOne(Categories::class, 'id', 'id_categoria');
    }
    public function content(){
    	return $this->hasOne(Contents::class, 'id', 'id_conteudo');
    }
}
