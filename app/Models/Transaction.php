<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded=[];
    use HasFactory;
    const STATUS_DONE=1;
    const STATUS_DEFAULT=0;
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
