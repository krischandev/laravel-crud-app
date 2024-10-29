<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchedProfileSetReq;
use App\Models\Employee;
use App\Models\ScheduleProfile;
use App\Models\ScheduleSettings;
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
        $empProfile = Employee::get();
        $ssProfile = ScheduleSettings::get();
        return view('scheduleprofile.create',compact('empProfile','ssProfile'));
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
        $scheduleprofile = ScheduleProfile::with('schedEmp')->find($id);
        $employee = Employee::get();
        $scheduleSettingsAll = ScheduleSettings::get();
        // dd($employee);
        return view('scheduleprofile.edit',compact('scheduleprofile','employee','scheduleSettingsAll'));
    }

    public function update(SchedProfileSetReq $request, ScheduleProfile $scheduleprofile)
    {
// dd($schedulesetting);
        
        $scheduleprofile->update([
            'sp_ss_id'=> $request->sp_ss_id,
        ]);
        return redirect('/scheduleprofile')->with('status','Schedule Assigned Updated Successfully');
    }
    public function destroy($id)
    {
        $id = ScheduleProfile::find($id)->delete();
       return redirect('/scheduleprofile')->with('status','Employee Deleted Successfully');
    }
}
