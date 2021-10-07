<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    //
    protected $table = 'tickets';

    //TODO: name of fillable columns in db
    protected $fillable = ['name','URL', 'photo', 'remark', 'status', 'type', 'madeBy', 'developer'];

    public function developerUser()
    {
        return $this->belongsTo(User::class , 'developer');
    }
    public function madeByUser()
    {
        return $this->belongsTo(User::class , 'madeBy');
    }
}
