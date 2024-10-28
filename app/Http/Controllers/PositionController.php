<?php

namespace App\Http\Controllers;

use App\Http\Requests\PosReq;
use App\Models\Position;
use App\Models\Department;

use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $position = Position::with('posDept')->get();
        return view('position.index',compact('position'));
    }
    public function create()
    {
        $department = Department::get();
        return view('position.create',compact('department'));
    }
    public function store(PosReq $request)
    {
        Position::create([
            'pos_acronym'=> $request->pos_acronym,
            'pos_title'=> $request->pos_title,
            'pos_dept_id'=> $request->pos_dept_id,
            
        ]);

        return redirect('/position')->with('status','Position Created Successfully');
    }

    public function edit($id)
    {
        $position = Position::with('posDept')->find($id);
        $department = Department::get();
        return view('position.edit',compact('position','department'));
    }

    public function update(PosReq $request, Position $position)
    {
        $position->update([
            'pos_acronym'=> $request->pos_acronym,
            'pos_title'=> $request->pos_title,
            'pos_dept_id'=> $request->pos_dept_id,
        ]);

        return redirect('/position')->with('status','Position Updated Successfully');
    }
}
