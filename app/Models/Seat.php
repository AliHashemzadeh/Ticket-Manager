<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{

    public function sections()
    {
        return $this->belongsToMany(Section::class, 'seat_section');
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_seat')->withPivot('user_id', 'status', 'price', 'order_id');
    }
}
