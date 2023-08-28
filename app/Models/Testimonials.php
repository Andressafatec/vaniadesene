<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Testimonials extends Authenticatable
{
    use Notifiable;
    protected $table = 'testimonials';
     protected $fillable = [
                'locale',
                'name',
                'title_job',
                'text',
                'status',
                'video',
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
      public function intro($limit = 15){
            $text = strip_tags($this->text) . " ";
        return mb_strimwidth($text, 0, $limit, "...");
    }
}
