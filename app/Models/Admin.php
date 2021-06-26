<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;



class Admin extends Authenticatable
{
    use HasFactory;
    public function state(){
        return $this->belongsTo(State::class,'state_id','id');
    }
}
