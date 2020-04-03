<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $guarded = [];

    public function scopeName($query, $name)
    {
        return $query->where('name', $name)->first();
    }

}
