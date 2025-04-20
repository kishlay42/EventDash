<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Timesheet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    public function index()
    {
        return view('report.index');
    }

    public function chartData()
    {
        $userId = Auth::id(); // Get the authenticated user's ID

        // Pie chart: Task status counts (user-specific)
        $taskStatus = Task::where('user_id', $userId)
                          ->selectRaw('status, COUNT(*) as total')
                          ->groupBy('status')
                          ->pluck('total', 'status');

        // Bar chart: Hours logged per task (user-specific)
        $hoursPerTask = Timesheet::select('tasks.name', DB::raw('SUM(timesheets.hours_worked) as total_hours'))
                          ->join('tasks', 'timesheets.task_id', '=', 'tasks.id')
                          ->where('tasks.user_id', $userId) // Filter by user ID
                          ->groupBy('tasks.name')
                          ->pluck('total_hours', 'name');

        // Line chart: Daily total hours (user-specific)
        $dailyHours = Timesheet::select('date', DB::raw('SUM(hours_worked) as total_hours'))
                          ->join('tasks', 'timesheets.task_id', '=', 'tasks.id')
                          ->where('tasks.user_id', $userId) // Filter by user ID
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