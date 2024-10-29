<?php

namespace App\Http\Controllers;

use App\Http\Requests\PayrolLProReq;
use App\Models\Employee;
use App\Models\PayrollProfile;
use Illuminate\Http\Request;

class PayrollProfileController extends Controller
{
    public function index()
    {
        $payrollprofile = PayrollProfile::with('pyrEmp')->get();
        return view('payrollprofile.index',compact('payrollprofile'));
    }
    public function create()
    {
        $empProfile = Employee::get();
        return view('payrollprofile.create',compact('empProfile'));
    }
    public function store(PayrolLProReq $request)
    {
        PayrollProfile::create([
            'pp_emp_id'=> $request->pp_emp_id,
            'pp_dailyrate'=> $request->pp_dailyrate,
            'pp_allowance'=> $request->pp_allowance,
            
        ]);

        return redirect('/payrollprofile')->with('status','Payroll Profile Created Successfully');
    }

    public function edit($id)
    {
        $payrollprofile = PayrollProfile::with('pyrEmp')->find($id);
        $employee = Employee::get();
        // dd($employee);
        return view('payrollprofile.edit',compact('payrollprofile','employee'));
    }

    public function update(PayrolLProReq $request, PayrollProfile $payrollprofile)
    {
// dd($position);

        $payrollprofile->update([
           'pp_dailyrate'=> $request->pp_dailyrate,
            'pp_allowance'=> $request->pp_allowance,
        ]);

        return redirect('/payrollprofile')->with('status','Payroll Profile Updated Successfully');
    }
}
