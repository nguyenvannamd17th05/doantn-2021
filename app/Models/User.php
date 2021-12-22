<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Arr;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{

    use HasFactory;

    use Notifiable;

    protected $guarded=[];
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];
    protected $u_active=[
        1 => [
            'name'  => 'Active',
            'class' => 'badge-primary'
        ],
        0=>[
            'name' =>'Un-Active',
            'class'=>'badge-danger'
        ]
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getActive(){
        return Arr::get($this->u_active,$this->active,'[N\A]');
    }
    protected $appends = [
        'profile_photo_url',
    ];
}
