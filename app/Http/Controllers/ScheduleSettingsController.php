<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchedSetReq;
use App\Models\ScheduleSettings;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScheduleSettingsController extends Controller
{
    public function index()
    {
        $schedulesettings = ScheduleSettings::get();
        return view('schedulesettings.index',compact('schedulesettings'));
    }
    public function create()
    {
        $schedulesettings = ScheduleSettings::get();
        return view('schedulesettings.create',compact('schedulesettings'));
    }
    public function store(SchedSetReq $request)
    {
        
        $ss_minutes = Carbon::parse($request->input('ss_time_from'))->diffInMinutes(Carbon::parse($request->input('ss_time_to')));//you also find difference in hours using diffInHours()
        ScheduleSettings::create([
            'ss_shift_title'=> $request->ss_shift_title,
            'ss_time_from'=> $request->ss_time_from,
            'ss_time_to'=> $request->ss_time_to,
            'ss_minutes'=> $ss_minutes,
        ]);

        return redirect('/schedulesettings')->with('status','Schedule Created Successfully');
    }
    public function edit($id)
    {
        $schedulesetting = ScheduleSettings::find($id);
        return view('schedulesettings.edit',compact('schedulesetting'));
    }

    public function update(SchedSetReq $request, ScheduleSettings $schedulesetting)
    {
        $ss_minutes = Carbon::parse($request->input('ss_time_from'))->diffInMinutes(Carbon::parse($request->input('ss_time_to')));//you also find difference in hours using diffInHours()
// dd($schedulesetting);
        
        $schedulesetting->update([
            'ss_shift_title'=> $request->ss_shift_title,
            'ss_time_from'=> $request->ss_time_from,
            'ss_time_to'=> $request->ss_time_to,
            'ss_minutes'=> $ss_minutes,
        ]);
        return redirect('/schedulesettings')->with('status','Schedule Updated Successfully');
    }
}
