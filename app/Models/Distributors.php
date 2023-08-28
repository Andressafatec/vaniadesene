<?php
namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Distributors extends Authenticatable
{
    use Notifiable;
    protected $table = 'distributors';
    protected $fillable = [
                'title',
                'category',
                'street',
                'number',
                'city',
                'state',
                'zip_code',
                'phone_number',
                'mobile_number',
                'contact',
                'email',
                'lat',
                'long',
                'status',
            ];
}
