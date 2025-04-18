<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Timesheet;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {
        return view('report.index');
    }

    public function chartData()
    {
        // Pie chart: Task status counts
        $taskStatus = Task::selectRaw('status, COUNT(*) as total')
                          ->groupBy('status')
                          ->pluck('total', 'status');

        // Bar chart: Hours logged per task
        $hoursPerTask = Timesheet::select('tasks.name', DB::raw('SUM(timesheets.hours_worked) as total_hours'))
                          ->join('tasks', 'timesheets.task_id', '=', 'tasks.id')
                          ->groupBy('tasks.name')
                          ->pluck('total_hours', 'name');

        // Line chart: Daily total hours
        $dailyHours = Timesheet::select('date', DB::raw('SUM(hours_worked) as total_hours'))
                          ->groupBy('date')
                          ->orderBy('date')
                          ->pluck('total_hours', 'date');

        return response()->json([
            'taskStatus' => $taskStatus,
            'hoursPerTask' => $hoursPerTask,
            'dailyHours' => $dailyHours,
        ]);
    }
}
