<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class DownloadsFiles extends Authenticatable
{
    use Notifiable;
    protected $table = 'downloads_files';
    protected $fillable = [
      		'download_id',
                'file',
                'type',
            ];
    public function getNameFileAttribute($value)
    {
    	$name = explode("_",$this->file);
        if(count($name) > 0){
                return @$name[1];
            }else{
                return "";
            }
    }
     public function download(){
            return $this->hasOne(Downloads::class,'id','download_id');
    }
}
