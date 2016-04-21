<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id',
        'idea_id',
        'cmt_user_id',
        'status'
    ];
}
