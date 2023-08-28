<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use URL;
class Locale extends Model
{
    protected $table = 'locale';
    protected $fillable = [
    		'title',
    		'flag',	
    		'status'
	];
	public function flagImage(){
		return '<span class="flag-icon flag-icon-'.strtolower($this->flag) .'"></span>';
	}
}
