<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function eventSeats()
    {
        return $this->hasMany(EventSeat::class);
    }
}