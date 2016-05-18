<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'body'
    ];

    public function idea()
    {
        return $this->belongsTo(Idea::class);
    }

    public function user(){

        return $this->belongsTo(User::class);
    }
}
