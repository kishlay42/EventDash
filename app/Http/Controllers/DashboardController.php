<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Timesheet;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = Auth::id(); // Get the authenticated user's ID

        // Total tasks for the authenticated user
        $totalTasks = Task::where('user_id', $userId)->count();

        // Total hours worked for the authenticated user's tasks
        $totalHours = Timesheet::join('tasks', 'timesheets.task_id', '=', 'tasks.id')
                               ->where('tasks.user_id', $userId)
                               ->sum('timesheets.hours_worked');

        // Task status counts for the authenticated user
        $taskStatus = Task::where('user_id', $userId)
                          ->select('status', DB::raw('count(*) as total'))
                          ->groupBy('status')
                          ->pluck('total', 'status');

        // Task priority counts for the authenticated user
        $taskPriority = Task::where('user_id', $userId)
                            ->select('priority', DB::raw('count(*) as total'))
                            ->groupBy('priority')
                            ->pluck('total', 'priority');

        // Recent tasks for the authenticated user
        $recentTasks = Task::where('user_id', $userId)
                           ->orderBy('created_at', 'desc')
                           ->take(5)
                           ->get();

        return view('dashboard', compact('totalTasks', 'totalHours', 'taskStatus', 'taskPriority', 'recentTasks'));
    }
}