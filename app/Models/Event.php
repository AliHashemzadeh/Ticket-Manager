<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function halls()
    {
        return $this->hasMany(Hall::class);
    }

    public function sections()
    {
        return $this->belongsToMany(Section::class,'event_section')->withPivot('price');
    }

    public function seats()
    {
        return $this->belongsToMany(Seat::class,'event_seat')->withPivot('user_id', 'status', 'price', 'order_id');
    }
}
