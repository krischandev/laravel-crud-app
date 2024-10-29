<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpReq;
use App\Models\Employee;
use App\Models\Position;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::with('empPos')->get();
        return view('employees.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $position = Position::with('posDept')->get();
        return view('employees.create',compact('position'));
    }
    
    public function store(EmpReq $request)
    {
        
        [$posId,$posAcro] = explode(',' , $request->input('emp_pos_id'));
        $genId = DB::table('employees')->max('id')+1;
        $dateYear = date('Y');
// dd($posId,$posAcro);
        Employee::create([
            'emp_id'=> Str::charAt($request->emp_fn,0)."".Str::charAt($request->emp_mn,0)."".Str::charAt($request->emp_ln,0)."".$dateYear."".$genId."".$posAcro,
            'emp_fn'=> $request->emp_fn,
            'emp_mn'=> $request->emp_mn,
            'emp_ln'=> $request->emp_ln,
            'emp_pos_id' => $posId,
            'emp_date_hired'=> $request->emp_date_hired,
            'emp_addr'=> $request->emp_addr,
            'emp_cn'=> $request->emp_cn,
            'emp_gender'=> $request->emp_gender,
            'status'=> $request->status,
        ]);

        return redirect('/employees')->with('status','Employee Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employees = Employee::with('empPos')->find($id);
        $position = Position::with('posEmp')->get();
        return view('employees.edit',compact('employees','position'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmpReq $request, Employee $employee)
    {
        [$posId,$posAcro] = explode(',' , $request->input('emp_pos_id'));
        $dateYear = date('Y');
        $genId = Str::between($employee->emp_id,$dateYear,$posAcro);
// dd($genId);

        $employee->update([
            'emp_id'=> Str::charAt($request->emp_fn,0)."".Str::charAt($request->emp_mn,0)."".Str::charAt($request->emp_ln,0)."".$dateYear."".$genId."".$posAcro,
            'emp_fn'=> $request->emp_fn,
            'emp_mn'=> $request->emp_mn,
            'emp_ln'=> $request->emp_ln,
            'emp_pos_id' => $posId,
            'emp_date_hired'=> $request->emp_date_hired,
            'emp_addr'=> $request->emp_addr,
            'emp_cn'=> $request->emp_cn,
            'emp_gender'=> $request->emp_gender,
            'status'=> $request->status,
        ]);

        return redirect('/employees')->with('status','Employee Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $id = Employee::find($id)->delete();
       return redirect('/employees')->with('status','Employee Deleted Successfully');
    }
}
