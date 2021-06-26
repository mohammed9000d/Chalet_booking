<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chalet extends Model
{
    use HasFactory;

    public function state() {
        return $this->belongsTo(State::class, 'state_id', 'id');
    }

    public function owner(){
        return $this->hasOne(Owner::class,'owner_id','id');
    }

    public function reservations() {
        return $this->hasMany(Reservation::class, 'chalet_id', 'id');
    }

    public function images() {
        return $this->hasMany(Image::class, 'chalet_id', 'id');
    }

    public function favorites() {
        return $this->hasMany(Favorite::class, 'chalet_id', 'id');
    }

    public function sliders() {
        return $this->hasMany(Slider::class, 'chalet_id', 'id');
    }

    public function comments() {
        return $this->hasMany(Comment::class, 'chalet_id', 'id');
    }
}
