<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeptReq;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $department = Department::get();
        return view('department.index',compact('department'));
    }
    public function create()
    {
        return view('department.create');
    }
    public function store(DeptReq $request)
    {
        Department::create([
            'dept_title'=> $request->dept_title,
            
        ]);

        return redirect('/department')->with('status','Department Created Successfully');
    }
}
