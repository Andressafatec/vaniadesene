<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuAssociacao extends Model
{
    protected $table = 'menu_associacao';
    protected $fillable = [
        'id_item_menu',
        'id_conteudo',
    ];
    public function conteudo(){
        return $this->hasOne(Contents::class,'id','id_conteudo');
    }
}
