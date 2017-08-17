<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //
    protected $fillable =['email','firstname','lastname', 'issue'];

    public function comment()
    {
        return $this->hasMany('App\Comment');
    }
}
