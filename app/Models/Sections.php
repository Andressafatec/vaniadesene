<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Sections extends Model
{
    protected $table = 'sections';
    protected $fillable = [
			'title',
			'slug',
			'status',
			'route',
			'news',
			'add_blocks'
    ];

	public function conteudos(){
		return $this->hasMany(Contents::class, 'id_section','id')->orderBy('title','asc');
	  }
}
