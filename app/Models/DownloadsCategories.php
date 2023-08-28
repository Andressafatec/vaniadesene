<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class DownloadsCategories extends Authenticatable
{
    use Notifiable;
    protected $table = 'downloads_categories';
    protected $fillable = [
                'locale',
                'title',
                'slug',
                'text',
                'parent_id',
                'sessao_id',
                'status',
                'media_id',
    ];
    public function scopeLocale($query){
        $locale = app()->getLocale();
        return $query->where('locale', $locale);
    }
    public function media(){
            return $this->hasOne(Media::class,'id','media_id');
    }
    public function downloads(){
            return $this->hasMany(Downloads::class,'id_category','id');
    }
}
