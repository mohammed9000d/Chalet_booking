<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    // use HasFactory;
    protected $fillable = [
        'name', 'status', 'city_id'
    ];

    public function city() {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function users() {
        return $this->hasMany(User::class, 'state_id', 'id');
    }

    public function admins() {
        return $this->hasMany(Admin::class, 'state_id', 'id');
    }

    public function owners() {
        return $this->hasMany(Owner::class, 'state_id', 'id');
    }

    public function chalets() {
        return $this->hasMany(Chalet::class, 'state_id', 'id');
    }
}
