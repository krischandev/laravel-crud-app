<?php

namespace App\Http\Controllers;

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
}
