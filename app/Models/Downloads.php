<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class Downloads extends Authenticatable
{
    use Notifiable;
    protected $table = 'downloads';
     protected $fillable = [
                 'locale',
                'title',
                'slug',
                'text',
                'status',
                'id_category',
                'media_id',
                'zip_file'
            ];
    public function scopeLocale($query){
        $locale = app()->getLocale();
        return $query->where('locale', $locale);
    }
    public function media(){
            return $this->hasOne(Media::class,'id','media_id');
    }
    public function documents(){
        return $this->hasMany(DownloadsFiles::class,'download_id','id')->where('type','document');
    }
    public function videos(){
        return $this->hasMany(DownloadsFiles::class,'download_id','id')->where('type','video');
    }
      public function intro($limit = 15){
            $text = strip_tags($this->text) . " ";
        return mb_strimwidth($text, 0, $limit, "...");
    }
}
