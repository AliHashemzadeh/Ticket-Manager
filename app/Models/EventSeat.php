<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class EventSeat extends Model
{

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }
}
