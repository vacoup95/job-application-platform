<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $guarded = [];

    public function notable()
    {
        return $this->morphTo();
    }

    public function scopeMotivation($query)
    {
        return $query->where('name', '=', 'Motivation letter');
    }

    public function scopeNotMotivation($query)
    {
        return $query->where('name', '!=', 'Motivation letter');
    }
}
