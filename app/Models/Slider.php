<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    public function chalet(){
        return $this->belongsTo(Chalet::class,'chalet_id','id');
    }
}
