<?php

namespace App\Http\Controllers;

use App\Models\Cookie;
use App\Models\Log;
use Illuminate\Http\Request;

class LogController extends Controller
{
    function create(Request $request) {
        $log = new Log;
        $log->url = $request->fullUrl();
        /*if ($request->filled('cookies')) {
            $cookie = new Cookie;
            $cookie->cookie_parameter = $request->query('query');
            $cookie->log_id = $log->id;
            $cookie->save();
        }*/

        $log->save();
    }

    function index() {
        return view('logs.index', ['logs' => Log::query()->paginate(10)]);
    }
}
