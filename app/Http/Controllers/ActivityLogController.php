<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseFormatter;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class ActivityLogController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            if ($request->from && $request->to) {
                $activity = Activity::with('subject', 'causer')->whereDate('created_at', '>=', $request->from)->whereDate('created_at', '<=', $request->to)->latest()->get();
            } else {
                $activity = Activity::with('subject', 'causer')->latest()->limit(100)->get();
            }

            return ResponseFormatter::success($activity, 'Data berhasil diambil');
        }


        return view('pages.activity.index');
    }
}
