<?php

namespace App\Http\Controllers;

use App\Models\PayrollSheet;
use Illuminate\Http\Request;

class PayrollSheetController extends Controller
{
    public function index()
    {
        $payrollsheet = PayrollSheet::with('pyrEmp')->get();
        return view('payrollsheet.index',compact('payrollsheet'));
    }
//     public function create()
//     {
//         $empProfile = Employee::get();
//         return view('payrollprofile.create',compact('empProfile'));
//     }
//     public function store(PayrolLProReq $request)
//     {
//         PayrollProfile::create([
//             'pp_emp_id'=> $request->pp_emp_id,
//             'pp_dailyrate'=> $request->pp_dailyrate,
//             'pp_allowance'=> $request->pp_allowance,
            
//         ]);

//         return redirect('/payrollprofile')->with('status','Payroll Profile Created Successfully');
//     }

//     public function edit($id)
//     {
//         $payrollprofile = PayrollProfile::with('pyrEmp')->find($id);
//         $employee = Employee::get();
//         // dd($employee);
//         return view('payrollprofile.edit',compact('payrollprofile','employee'));
//     }

//     public function update(PayrolLProReq $request, PayrollProfile $payrollprofile)
//     {
// // dd($position);

//         $payrollprofile->update([
//            'pp_dailyrate'=> $request->pp_dailyrate,
//             'pp_allowance'=> $request->pp_allowance,
//         ]);

//         return redirect('/payrollprofile')->with('status','Payroll Profile Updated Successfully');
//     }
//     public function destroy($id)
//     {
//         $id = PayrollProfile::find($id)->delete();
//        return redirect('/payrollprofile')->with('status','Employee Deleted Successfully');
//     }
}
