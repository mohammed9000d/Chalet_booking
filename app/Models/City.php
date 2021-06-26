<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    protected $fillable = [
        'name', 'status'
    ];

    public function states() {
        return $this->hasMany(State::class, 'city_id', 'id');
    }
}
