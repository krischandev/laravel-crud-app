<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimeCardController extends Controller
{
    public function index()
    {
        return view('timecard.index');
    }
}
