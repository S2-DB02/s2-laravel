<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    //
    protected $table = 'comments';

    //TODO: name of fillable columns in db
    protected $fillable = ['comment','userId','ticketId'];
    public function madeBy()
    {
        return $this->belongsTo(User::class , 'userId');
    }
    public function ticket()
    {
        return $this->belongsTo(ticket::class , 'ticketId');
    }
}
