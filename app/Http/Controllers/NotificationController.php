<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{
    public function update()
    {
        return $notification = DB::table('notifications')->where('status', 'like', 'pending')->get();
        
    }
}
