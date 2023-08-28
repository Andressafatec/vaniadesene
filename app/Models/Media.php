<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use URL;
use Image;
use File;
class Media extends Model
{
     protected $table = 'media';
     protected $appends = array('CheckTypeFile');
    protected $fillable = [
        'id',
        'file',
        'alt',
        'type',
        'folder_parent',
        'folder'
        ];
    public function fullpatch($width = null, $height = null){
            
                        
                return URL::to('/')."/uploads/".$this->folder_parent.$this->folder.$this->file;
            
    }
    public function getCheckTypeFileAttribute(){
        return $this->CheckType();
        

    }
     public function CheckType(){
        $type = $this->type;
        if(in_array(strtolower($type),['jpg','png','gif','tif','svg','webp','jpeg'])){
            return "image";
        }elseif(in_array($type,['mov','mp4','avi','3gp'])){
            return "video";                
        }elseif(in_array($type,['pdf','word','ppt','xls'])){
            return "document";                
        }else{
            return "outher";                
        }
        

    }
}
