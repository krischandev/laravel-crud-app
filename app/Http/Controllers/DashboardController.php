<?php

namespace App\Http\Controllers;

use App\Models\AttendanceSheet;
use App\Models\Dashboard;
use App\Models\Employee;
use App\Models\ScheduleSettings;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $checkAbsence = Employee::doesntHave('atdEmphasMany')->get('emp_id');

        $dashboard = Dashboard::get();
        $schedulesettings = ScheduleSettings::get();
        $attendancesheet = AttendanceSheet::get();
        // dd($checkAbsence);
        return view('dashboard.index',compact('dashboard','schedulesettings','attendancesheet','checkAbsence'));
    }
}
