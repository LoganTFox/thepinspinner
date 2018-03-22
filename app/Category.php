<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function boards()
    {
        return $this->hasMany(Board::class);
    }

    public function pins()
    {
        return $this->hasMany(Pin::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}