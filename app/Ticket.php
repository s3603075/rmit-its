<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $fillable =['user_id','email','firstname','lastname', 'issue'];

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }

    protected static function boot()
    {
        parent::boot();

        static::deleting(function($ticket) { // before delete() method call this
            $ticket->comment()->delete();

        });
    }
}
