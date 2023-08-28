<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class ContentsBlocks extends Model
{
    protected $table = 'contents_blocks';
    protected $fillable = [
        'id_content',
        'status',
        'featured', 
        'media_id', 
        'text',
        'bg_color',
        'order',
        'column',
        'align_image',
        'column_image',
        'section_width',
        'class_row',
        'id_row'
    ];
     public function media(){
            return $this->hasOne(Media::class,'id','media_id');
            
    }
     public function galeria(){
            return $this->hasMany(Galerias::class,'block_id','id')->orderBy('ordem','asc');
            
    }

    
}
