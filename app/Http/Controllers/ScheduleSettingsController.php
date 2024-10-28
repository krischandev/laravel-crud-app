<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchedSetReq;
use App\Models\ScheduleSettings;

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
        ScheduleSettings::create([
            'ss_shift_title'=> $request->ss_shift_title,
            
            
        ]);

        return redirect('/schedulesettings')->with('status','Schedule Created Successfully');
    }
}
