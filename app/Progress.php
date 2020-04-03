<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    protected $guarded = [];

    public function communicationMethod()
    {
        return $this->belongsTo(CommunicationMethods::class)->first();
    }

    public function notes()
    {
        return $this->morphMany('App\Note', 'notable');
    }

    public function action()
    {
        return $this->belongsTo(Action::class);
    }

    public function type()
    {
        return $this->action()->pluck('action')->first();
    }
}
