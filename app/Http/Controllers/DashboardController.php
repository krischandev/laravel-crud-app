<?php

namespace App\Http\Controllers;
use App\Models\Dashboard;
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
        $dashboard = Dashboard::get();
        return view('dashboard.index',[
            'dashboard' => $dashboard
            ]);
    }
}
