<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{

    public function halls()
    {
        return $this->belongsTo(Hall::class);
    }

    public function seats()
    {
        return $this->belongsToMany(Seat::class, 'seat_section');
    }

    public function events()
    {
        return $this->belongsToMany(Event::class,'event_section')->withPivot('price');
    }
}
