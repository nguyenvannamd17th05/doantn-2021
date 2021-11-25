<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;


class Category extends Model
{
    protected $guarded=[];
    use HasFactory;
    const STATUS_PUBLIC=1;
    const STATUS_PRIVATE=0;
    const HOME=1;
    protected $status=[
        1=>[
            'name'=>'Public',
            'class'=>'badge-danger'
        ],
        0=>[
            'name'=>'Private',
            'class'=>'badge-info'
        ]
    ];
    protected $home=[
        1=>[
            'name'=>'Hot',
            'class'=>'badge-success'
        ],
        0=>[
            'name'=>'Private',
            'class'=>'badge-info'
        ]
    ];
    public function getStatus(){
        return Arr::get($this->status,$this->c_active,'[N\A]');
    }
    public function getHome(){
        return Arr::get($this->home,$this->c_home,'[N\A]');
    }
    public function product(){
        return $this->hasMany(Product::class,'cate_id');
    }
}
