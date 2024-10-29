<?php

namespace App\Http\Controllers;

use App\Models\AttendanceSheet;
use App\Models\Employee;
use App\Models\PayrollDeductions;
use App\Models\PayrollProfile;
use App\Models\PayrollSheet;
use Illuminate\Http\Request;

class PayrollSheetController extends Controller
{
    public function index()
    {
        $payrollsheet = PayrollSheet::with('pyrProfile.pyrEmp')->get();
        return view('payrollsheet.index',compact('payrollsheet'));
    }
    public function show($id)
    {
        $payrollsheet = PayrollSheet::with('pyrProfile.pyrEmp.empPos')->find($id);
        $pyDeduct = PayrollDeductions::get()->first();
        return view('payrollsheet.show',compact('payrollsheet','pyDeduct'));
    }
    public function create()
    {
        $payProfile = PayrollProfile::with('pyrEmp')->get();
        return view('payrollsheet.create',compact('payProfile'));
    }
    public function store(Request $request)
    {
        $from = $request->ps_date_from;
        $to = $request->ps_date_to;
        $payProfile = PayrollProfile::with('pyrEmp')->find($request->ps_pp_id);
        $payEmp = $payProfile['pyrEmp']['id'];
        $dailyrate = $payProfile['pp_dailyrate'];
        $allowance = $payProfile['pp_allowance'];

        $attendancesheet = AttendanceSheet::whereBetween('atd_date', [$from, $to])->where('atd_emp_id','=',$payEmp)->get();
        $ps_days =count($attendancesheet);

        $pyDeduct = PayrollDeductions::get()->first();
        $totdeduct = (($dailyrate*13)*($pyDeduct['pd_sss']/100))+$pyDeduct['pd_pagibig']+$pyDeduct['pd_philhealth']+$pyDeduct['pd_others'];
        
        $ps_grosspay = ($dailyrate*$ps_days)+$allowance;
        $ps_netincome = $ps_grosspay-$totdeduct;
        
        // dd($attendancesheet);

        PayrollSheet::create([
            'ps_pp_id'=> $request->ps_pp_id,
            'ps_date_from'=> $request->ps_date_from,
            'ps_date_to'=> $request->ps_date_to,
            'ps_days'=>$ps_days,
            'ps_totdeduct' =>$totdeduct,
            'ps_grosspay'=>$ps_grosspay,
            'ps_netincome'=>$ps_netincome,
            
        ]);

        return redirect('/payrollsheet')->with('status','Payroll Sheet Created Successfully');
    }

    public function edit($id)
    {
        $payrollsheet = PayrollSheet::with('pyrProfile.pyrEmp')->find($id);
        // $employee = Employee::get();
        return view('payrollsheet.edit',compact('payrollsheet'));
    }

    public function update(Request $request, PayrollSheet $payrollsheet)
    {
            $from = $request->ps_date_from;
            $to = $request->ps_date_to;
            $payProfile = PayrollProfile::with('pyrEmp')->find($request->ps_pp_id);
            $payEmp = $payProfile['pyrEmp']['id'];
            $dailyrate = $payProfile['pp_dailyrate'];
            $allowance = $payProfile['pp_allowance'];

            $attendancesheet = AttendanceSheet::whereBetween('atd_date', [$from, $to])->where('atd_emp_id','=',$payEmp)->get();
            $ps_days =count($attendancesheet);

            $pyDeduct = PayrollDeductions::get()->first();
            $totdeduct = (($dailyrate*13)*($pyDeduct['pd_sss']/100))+$pyDeduct['pd_pagibig']+$pyDeduct['pd_philhealth']+$pyDeduct['pd_others'];

            $ps_grosspay = ($dailyrate*$ps_days)+$allowance;
            $ps_netincome = $ps_grosspay-$totdeduct;
// dd($payEmp);

        $payrollsheet->update([
            'ps_date_from'=> $request->ps_date_from,
            'ps_date_to'=> $request->ps_date_to,
            'ps_days'=>$ps_days,
            'ps_totdeduct' =>$totdeduct,
            'ps_grosspay'=>$ps_grosspay,
            'ps_netincome'=>$ps_netincome,
        ]);

        return redirect('/payrollsheet')->with('status','Payroll Sheet Updated Successfully');
    }
    public function destroy($id)
    {
        $id = PayrollSheet::find($id)->delete();
       return redirect('/payrollsheet')->with('status','Payroll Sheet Deleted Successfully');
    }
}
