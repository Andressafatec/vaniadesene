<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Galerias extends Model

{

    protected $table = 'galerias';

    protected $fillable = [

    		'block_id',
    		'media_id',
			'ordem',

        

	];

	public function media(){

        return $this->hasOne(Media::class, 'id','media_id');

    }

    

}

