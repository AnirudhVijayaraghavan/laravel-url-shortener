<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuestShortURLS extends Model
{
    //
    protected $table = 'guestshorturls';
    protected $fillable = [

        'longURL',
        'shortURL'
    ];
}
