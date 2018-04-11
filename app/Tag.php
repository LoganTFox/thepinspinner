<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function notes()
    {
        return $this->belongsToMany('App\Note');
    }
}
