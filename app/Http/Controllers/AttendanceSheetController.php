<?php

namespace App\Http\Controllers;

use App\Models\AttendanceSheet;
use App\Models\Employee;
use App\Models\ScheduleProfile;

use Illuminate\Http\Request;
use Carbon\Carbon;

class AttendanceSheetController extends Controller
{
    public function index()
    {
        $attendancesheet = AttendanceSheet::with('atdEmp','atdEmpID')->get();
        return view('attendancesheet.index',compact('attendancesheet'));
    }
    public function create()
    {
        $employee = ScheduleProfile::with('schedEmp','schedSet')->get();
// dd($employee);

        return view('attendancesheet.create',compact('employee'));
    }
    public function store(Request $request)
    {

        $ss_time_from = ScheduleProfile::with('schedEmp','schedSet')->find($request->atd_emp_id);
        $ss_time_from = $ss_time_from['schedSet']['ss_time_from'];
// dd($ss_time_from);
        $atd_late = Carbon::parse($ss_time_from)->diffInMinutes(Carbon::parse($request->input('atd_in')));//you also find difference in hours using diffInHours()
        $atd_minutes = Carbon::parse($request->input('atd_in'))->diffInMinutes(Carbon::parse($request->input('atd_out')));//you also find difference in hours using diffInHours()

        AttendanceSheet::create([
            'atd_emp_id' => $request->atd_emp_id,
            'atd_date' => $request->atd_date,
            'atd_in' => $request->atd_in,
            'atd_break_out' => $request->atd_break_out,
            'atd_break_in' => $request->atd_break_in,
            'atd_out' => $request->atd_out,
            'atd_ot'=> $request->atd_ot,
            'atd_late'=> $atd_late,
            'atd_minutes'=> $atd_minutes,
            
        ]);

        return redirect('/attendancesheet')->with('status','Attendance Created Successfully');
    }

    public function edit($id)
    {
        // $position = Position::with('posDept')->find($id);
        // $department = Department::get();
        return view('attendancesheet.edit',compact('position','department'));
    }

    public function update(Request $request, AttendanceSheet $attendancesheet)
    {
// dd($position);

        $attendancesheet->update([
           'atd_emp_id' => $request->atd_emp_id,
            'atd_date' => $request->atd_date,
            'atd_in' => $request->atd_in,
            'atd_break_out' => $request->atd_break_out,
            'atd_break_in' => $request->atd_break_in,
            'atd_out' => $request->atd_out,
            'atd_ot'=> $request->atd_ot,
            'atd_late'=> $request->atd_late,
            'atd_minutes'=> $request->atd_minutes,
        ]);

        return redirect('/attendancesheet')->with('status','Position Updated Successfully');
    }
    public function destroy($id)
    {
        $id = AttendanceSheet::find($id)->delete();
       return redirect('/employees')->with('status','Employee Deleted Successfully');
    }
}
