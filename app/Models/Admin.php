<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class Admin extends Authenticatable
{
    protected $guarded=[];
    use HasFactory;
    const ACTIVE=1;
    const UN_ACTIVE=0;
    public function roles(){
        return $this->belongsTo(Role::class,'role_id');
    }
    protected $a_active=[
        1=>[
            'name'  => 'Active',
            'class' => 'badge-primary'
        ],
        0=>[
            'name'  => 'Unactive',
            'class' => 'badge-danger'
        ]
    ];
    public function getActive(){
        return Arr::get($this->a_active,$this->active,'[N\A]');
    }
    public function checkPermission($p_name){
        $role=Auth::guard('admins')->user()->roles;
        $permissions= $role->permission;
        if($permissions->contains('name',$p_name)){
            return true;
        }
        return false;
    }
}
