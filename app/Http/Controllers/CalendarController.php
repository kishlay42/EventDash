<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    public function index()
    {
        // Fetch tasks for the authenticated user only
        $tasks = Task::where('user_id', Auth::id())
            ->select('id', 'name', 'due_date', 'status', 'priority')
            ->get();

        return view('tasks.calendar', compact('tasks'));
    }
}