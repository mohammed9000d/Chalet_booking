<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Owner extends Authenticatable
{
    use HasFactory;
    public function state(){
        return $this->belongsTo(State::class,'state_id','id');
    }

    public function chalet(){
        return $this->belongsTo(Chalet::class,'owner_id','id');
    }
}
