<?php

namespace App\Http\Controllers;

use App\Models\AttendanceSheet;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceSheetController extends Controller
{
    public function index()
    {
        $attendancesheet = AttendanceSheet::with('atdEmp')->get();
        return view('attendancesheet.index',compact('attendancesheet'));
    }
    public function create()
    {
        $employee = Employee::get();
        return view('attendancesheet.create',compact('employee'));
    }
    public function store(Request $request)
    {
        AttendanceSheet::create([
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

        return redirect('/attendancesheet')->with('status','Attendance Created Successfully');
    }

    public function edit($id)
    {
        // $position = Position::with('posDept')->find($id);
        // $department = Department::get();
        return view('position.edit',compact('position','department'));
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

        return redirect('/position')->with('status','Position Updated Successfully');
    }
}
