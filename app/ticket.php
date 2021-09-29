<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    //
    protected $table = 'tickets';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
