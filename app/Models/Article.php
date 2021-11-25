<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Article extends Model
{
    use HasFactory;
    const STATUS_PUBLIC=1;
    const STATUS_PRIVATE=0;
    const HOT = 1;
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
    protected $hot = [
        1 => [
            'name' => 'Hot',
            'class' => 'badge-danger'
        ],
        0 => [
            'name' => 'None',
            'class' => 'badge-primary'
        ]
    ];
    public function getStatus(){
        return Arr::get($this->status,$this->a_active,'[N\A]');
    }
    public function getHot()
    {
        return Arr::get($this->hot,$this->a_hot,'[N\A]');
    }
    public function admin(){
        return $this->belongsTo(Admin::class,'a_author_id');
    }
}
