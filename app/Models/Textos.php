<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Textos extends Model{

    protected $table = 'textos';

    protected $fillable = ['locale','title','param','value'];




    public function scopeLocale($query){

        $locale = app()->getLocale();
        return $query->where('locale', $locale);



    }



}

