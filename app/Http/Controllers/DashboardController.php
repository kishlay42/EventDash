<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Timesheet;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalTasks = Task::count();
        $totalHours = Timesheet::sum('hours_worked');

        $taskStatus = Task::select('status', DB::raw('count(*) as total'))
                          ->groupBy('status')
                          ->pluck('total', 'status');

        return view('dashboard', compact('totalTasks', 'totalHours', 'taskStatus'));
    }
}
