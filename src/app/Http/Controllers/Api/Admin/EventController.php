<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Event;

class EventController extends Controller
{

    public function endEvents(Request $request)
    {
        $response = Event::where('end_date', '<=', date('Y-m-d'))->where('end_time', '<=', date('H:i:s'))->where('status', 2)->update(['status' => 3]);

        try {
            return response()->json([
                'response' => $response,
                'datetime' => date('Y-m-d H:i:s'),
                'status' => 200,
            ]);
        } catch (\Exception $e) {
            return response()->json($e, 500);
        }
    }
}
