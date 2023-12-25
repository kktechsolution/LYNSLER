<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPassword as ResetPasswordNotification;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    public function sendPasswordResetNotification($token)
    {
        // Your your own implementation.
        $this->notify(new ResetPasswordNotification($token));
    }

    protected $fillable = [
        'name',
        'email',
        'phone',
        'user_id',
        'gender',
        'password',
        'type',
        'avatar',
        'remarks',
        'is_active',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function manufacturer_details()
    {
        return $this->hasOne(ManufacturerDetail::class,'user_id');
    }

    public function designer_details()
    {
        return $this->hasOne(DesignerDetail::class,'user_id');
    }


    public function catlogs()
    {
        return $this->hasMany(Catlog::class,'user_id');
    }


    public function getAvatarAttribute($value)
      {
          return env('APP_URL') . '/avatar/' . $value;
      }
}
