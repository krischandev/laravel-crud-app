<?php

namespace App\Http\Controllers;

use App\Models\AttendanceSheet;
use App\Models\Employee;
use App\Models\ScheduleProfile;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class TimeCardController extends Controller
{
    public function index()
    {
        $timeCardEmp = Employee::get();
        return view('timecard.index',compact('timeCardEmp'));
    }
    
    public function store(Request $request)
    {
        $existIN="";
        $request->validate([
            'emp_id' => 'required',
        ]);
        // dd($request->input('optAttendance'));
        if($request->input('optAttendance')=="Time IN") {
                
                    // has no records
                        $newTime = AttendanceSheet::firstOrNew(['atd_emp_id' => $request->input('emp_id')]);
                        $empID = Employee::where('emp_id','=',$request->input('emp_id'))->first();
                        $ID = $empID['id'];
                        $date = Carbon::now()->toDateString();
                    $dateTime = Carbon::now()->toTimeString();
                        $ss_time_from = ScheduleProfile::with('schedEmp','schedSet')->find($ID);
                        $ss_time_from = $ss_time_from['schedSet']['ss_time_from'];
                // dd($ss_time_from);
                        $atd_late = Carbon::parse($ss_time_from)->diffInMinutes(Carbon::parse($request->input('atd_in')));//you also find difference in hours using diffInHours()
                    
                    if(AttendanceSheet::where('atd_emp_id', $ID)->where('atd_date','=',$date)->exists()){
                        $existIN="1";
                    }else{
                        $newTime->fill([
                            'atd_emp_id' => $ID,
                            'atd_date' => $date,
                            'atd_in' => $dateTime,
                            'atd_late'=> $atd_late,
                        ])->save(); 
                    }
        }elseif($request->input('optAttendance')=="Break OUT"){
            $empID = Employee::where('emp_id','=',$request->input('emp_id'))->first();
            $ID = $empID['id'];
            $date = Carbon::now()->toDateString();
            $dateTime = Carbon::now()->toTimeString();
            $breakOUT = AttendanceSheet::where('atd_date','=',$date)->where('atd_emp_id','=',$ID)->first();
               
            $breakOUT->update([
                'atd_break_out' => $dateTime,
             ]);
                
        }elseif($request->input('optAttendance')=="Break IN"){
            $empID = Employee::where('emp_id','=',$request->input('emp_id'))->first();
            $ID = $empID['id'];
            $date = Carbon::now()->toDateString();
            $dateTime = Carbon::now()->toTimeString();
            $breakIN = AttendanceSheet::where('atd_date','=',$date)->where('atd_emp_id','=',$ID)->first();
               
            $breakIN->update([
                'atd_break_in' => $dateTime,
             ]);
        }elseif($request->input('optAttendance')=="Time OUT"){
            $empID = Employee::where('emp_id','=',$request->input('emp_id'))->first();
            $ID = $empID['id'];
            $date = Carbon::now()->toDateString();
            $dateTime = Carbon::now()->toTimeString();
            $timeOUT = AttendanceSheet::where('atd_date','=',$date)->where('atd_emp_id','=',$ID)->first();
            $atd_in = $timeOUT['atd_in'];
            $atd_minutes = Carbon::parse($atd_in)->diffInMinutes(Carbon::parse($dateTime));//you also find difference in hours using diffInHours()
               
            $timeOUT->update([
                'atd_out' => $dateTime,
                'atd_minutes' => $atd_minutes,
             ]);
        }
        // dd($existIN);

        if($existIN==1){
            return redirect('/timecard')->with('error',$request->input('emp_id').' '.$request->input('optAttendance').' Already!');
        }else{
            return redirect('/timecard')->with('status',$request->input('emp_id').' '.$request->input('optAttendance').' Successfully');
        }

        // $prd = AttendanceSheet::updateOrCreate(['atd_emp_id' => 'PR7002']);
        // $prd->prod_name = $row['product_name'];
        
        // if ($prd->wasRecentlyCreated) {
        //     $prd->prod_brand = $row['brand'];
        // }
                
        // $prd->save();
    }
}
