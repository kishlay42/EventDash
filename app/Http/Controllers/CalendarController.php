<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class CalendarController extends Controller
{
    public function index()
    {
        // Fetch tasks with necessary fields
        $tasks = Task::select('id', 'name', 'due_date', 'status', 'priority')->get();

        return view('tasks.calendar', compact('tasks'));
    }
}