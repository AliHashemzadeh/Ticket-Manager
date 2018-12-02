<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{

    public function events()
    {
        return $this->belongsTo(Event::class);
    }

    public function sections()
    {
        return $this->hasMany(Section::class);
    }
}
