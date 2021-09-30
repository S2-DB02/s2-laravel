<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    //
    protected $table = 'tickets';

    //TODO: name of fillable columns in db
    protected $fillable = ['name', 'photo', 'remark', 'status', 'type', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
