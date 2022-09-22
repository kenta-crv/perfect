<?php

namespace App\Http\Controllers\Store;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notifications;

class NotificationController extends Controller
{
    public function index(){
        return view('store.notification.index');
    }

    public function informationDetails(){
        return view('store.notification.informationDetails');
    }
}
