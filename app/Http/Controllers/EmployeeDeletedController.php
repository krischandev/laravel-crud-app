<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeDeletedController extends Controller
{
    public function index()
    {
       $employees = Employee::onlyTrashed()->paginate(10);
       return view('employees-deleted.index',[
        'employees' => $employees
        ]);
    }

    public function restore($id)
    {
        $employees = Employee::withTrashed()->find($id);
        $employees->restore();

        return redirect('/employees-deleted')->with('status','Information Restored Successfully');
    }
}
