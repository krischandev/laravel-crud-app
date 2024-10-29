<?php

namespace App\Http\Controllers;

use App\Models\PayrollDeductions;
use Illuminate\Http\Request;

class PayrollDeductionController extends Controller
{
    public function index()
    {
        $payrolldeduction = PayrollDeductions::get();
        return view('payrolldeduction.index',compact('payrolldeduction'));
    }
    public function create()
    {
        return view('payrolldeduction.create');
    }
    public function store(Request $request)
    {
        PayrollDeductions::create([
            'pd_sss'=> $request->pd_sss,
            'pd_pagibig'=> $request->pd_pagibig,
            'pd_philhealth'=> $request->pd_philhealth,
            'pd_others'=> $request->pd_others,
            
        ]);

        return redirect('/payrolldeduction')->with('status','Payroll Deduction Created Successfully');
    }

    public function edit($id)
    {
        $payrolldeduction = PayrollDeductions::find($id);
        // $department = Department::get();
        return view('payrolldeduction.edit',compact('payrolldeduction'));
    }

    public function update(Request $request, PayrollDeductions $payrolldeduction)
    {
// dd($position);

        $payrolldeduction->update([
            'pd_sss'=> $request->pd_sss,
            'pd_pagibig'=> $request->pd_pagibig,
            'pd_philhealth'=> $request->pd_philhealth,
            'pd_others'=> $request->pd_others,
        ]);

        return redirect('/payrolldeduction')->with('status','Payroll Deduction Updated Successfully');
    }
    public function destroy($id)
    {
        $id = PayrollDeductions::find($id)->delete();
       return redirect('/payrolldeduction')->with('status','Employee Deleted Successfully');
    }
}
