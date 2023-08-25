<?php

namespace App\Http\Controllers;

use App\Models\Url;
use App\Models\VisitorLog;
class DetailsController extends Controller
{
    public function show(Url $uid, VisitorLog $logs)
    {
        $logs = VisitorLog::where('url_uid', $uid->uid)->orderBy('created_at', 'desc')->paginate(10);

        return view('details', ['url' => $uid], ['logs' => $logs]);
    }
}
