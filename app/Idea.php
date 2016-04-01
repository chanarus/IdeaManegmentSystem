<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Idea extends Model
{
    protected $fillable = [
    	'title',
    	'body',
		'category',
		'ratings',
    	'published_at'
    ];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
