<?php

namespace App\Http\Controllers;

use App\Models\AttendanceSheet;

use Illuminate\Http\Request;

class TimeCardController extends Controller
{
    public function index()
    {
        return view('timecard.index');
    }
    public function store(Request $request)
    {
        
        // $ss_minutes = Carbon::parse($request->input('ss_time_from'))->diffInMinutes(Carbon::parse($request->input('ss_time_to')));//you also find difference in hours using diffInHours()
        AttendanceSheet::create([
            'ss_shift_title'=> $request->ss_shift_title,
            'ss_time_from'=> $request->ss_time_from,
            'ss_time_to'=> $request->ss_time_to,
            'ss_minutes'=> $ss_minutes,
        ]);

        return redirect('/timecard')->with('status','Attendance Successfully');
    }
}
