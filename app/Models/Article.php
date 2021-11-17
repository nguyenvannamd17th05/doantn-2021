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
    public function getStatus(){
        return Arr::get($this->status,$this->a_active,'[N\A]');
    }
}
