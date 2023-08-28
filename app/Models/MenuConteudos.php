<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuConteudos extends Model
{
    protected $table = 'menu_conteudos';
    protected $fillable = [
        'id_menu',
        'id_conteudo',
        'ordem',
    ];
}
