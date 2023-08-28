<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tools extends Model{

    protected $table = 'tools';

    protected $fillable = ['locale','title','param','value'];




    public function scopeLocale($query){

        $locale = app()->getLocale();

        return $query->where('locale', $locale);

    }



}

