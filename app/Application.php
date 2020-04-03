<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $guarded = [];

    protected $dates = [
        'created_at',
        'updated_at',
        'application_send_at'
    ];

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }

    public function notes()
    {
        return $this->morphMany('App\Note', 'notable');
    }

    public function locations()
    {
        return $this->morphMany('App\Location', 'locationable');
    }

    public function progress()
    {
        return $this->hasMany(Progress::class);
    }

}
