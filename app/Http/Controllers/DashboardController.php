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

    $taskPriority = Task::select('priority', DB::raw('count(*) as total'))
                        ->groupBy('priority')
                        ->pluck('total', 'priority');

    $recentTasks = Task::orderBy('created_at', 'desc')->take(5)->get();

    return view('dashboard', compact('totalTasks', 'totalHours', 'taskStatus', 'taskPriority', 'recentTasks'));
}
}
