<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchedProfileSetReq;
use App\Models\ScheduleProfile;
use Illuminate\Http\Request;

class ScheduleProfileController extends Controller
{
    public function index()
    {
        $scheduleprofiles = ScheduleProfile::with('schedEmp','schedSet')->get();
        // dd($scheduleprofiles);
        return view('scheduleprofile.index',compact('scheduleprofiles'));
    }
    public function create()
    {
        $scheduleprofiles = ScheduleProfile::get();
        return view('scheduleprofiles.create',compact('scheduleprofiles'));
    }
    public function store(SchedProfileSetReq $request)
    {
        
        ScheduleProfile::create([
            'sp_emp_id'=> $request->sp_emp_id,
            'sp_ss_id'=> $request->sp_ss_id,
        ]);

        return redirect('/scheduleprofile')->with('status','Schedule Assigned Created Successfully');
    }
    public function edit($id)
    {
        $scheduleprofile = ScheduleProfile::find($id);
        return view('scheduleprofiles.edit',compact('scheduleprofile'));
    }

    public function update(SchedProfileSetReq $request, ScheduleProfile $scheduleprofile)
    {
// dd($schedulesetting);
        
        $scheduleprofile->update([
           'sp_emp_id'=> $request->sp_emp_id,
            'sp_ss_id'=> $request->sp_ss_id,
        ]);
        return redirect('/scheduleprofile')->with('status','Schedule Assigned Updated Successfully');
    }
}