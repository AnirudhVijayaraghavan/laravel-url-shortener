<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class shortenedURLs extends Model
{
    //
    protected $table = 'shortened_urls';
    protected $fillable = [

        'user_id',
        'longURL',
        'shortURL'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function toSearchableArray()
    {
        return [
            'longURL' => $this->longURL,
            'shortURL' => $this->shortURL

        ];
    }
}
