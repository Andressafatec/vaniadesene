<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videos extends Model
{
    use HasFactory;

    protected $fillable = [
		'imovel_id',
		'ordem',
		'descricao',
		'alterada',
		'url',
		'arquivo'
		
	];
	public function embedVideo(){
		$video = $this->url;

		$video = str_replace('https://www.youtube.com/watch?v=','',$video);
	
		if(strpos($video,'/')){
			$video = explode('/',$video);
			$video = end($video);
		}
		
		return 'https://www.youtube.com/embed/'.$video;
	}
}
