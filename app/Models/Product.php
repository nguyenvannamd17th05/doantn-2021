<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Product extends Model
{
    use HasFactory;
    const STATUS_PUBLIC=1;
    const STATUS_PRIVATE=0;
    const HOT_ON=1;
    const HOT_OFF=0;
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
    protected $hot=[
        1=>[
            'name'=>'Hot',
            'class'=>'badge-success'
        ],
        0=>[
            'name'=>'No',
            'class'=>'badge-info'
        ]
    ];
    public function getStatus(){
        return Arr::get($this->status,$this->pro_active,'[N\A]');
    }
    public function getHot(){
        return Arr::get($this->hot,$this->pro_hot,'[N\A]');
    }
    public function category(){
        return $this->belongsTo(Category::class,'cate_id');
    }

}
