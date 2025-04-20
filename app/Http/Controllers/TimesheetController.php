<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimesheetController extends Controller
{
    // Show all timesheets
    public function index()
    {
        // Fetch timesheets for tasks belonging to the authenticated user
        $timesheets = Timesheet::whereHas('task', function ($query) {
            $query->where('user_id', Auth::id());
        })->with('task')->orderBy('date', 'desc')->paginate(10);

        return view('timesheets.index', compact('timesheets'));
    }

    // Show create form
    public function create()
    {
        // Fetch tasks belonging to the authenticated user
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('timesheets.create', compact('tasks'));
    }

    // Store timesheet data
    public function store(Request $request)
    {
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'date' => 'required|date',
            'hours_worked' => 'required|numeric|min:0|max:24',
            'comments' => 'nullable|string'
        ]);

        // Ensure the task belongs to the authenticated user
        $task = Task::where('id', $request->task_id)->where('user_id', Auth::id())->first();
        if (!$task) {
            return redirect()->back()->withErrors(['task_id' => 'Invalid task selected.']);
        }

        Timesheet::create($request->all());
        return redirect()->route('timesheets.index')->with('success', 'Timesheet entry created successfully.');
    }

    // Show edit form
    public function edit(Timesheet $timesheet)
    {
        // Ensure the timesheet belongs to the authenticated user
        if ($timesheet->task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        // Fetch tasks belonging to the authenticated user
        $tasks = Task::where('user_id', Auth::id())->get();
        return view('timesheets.edit', compact('timesheet', 'tasks'));
    }

    // Update timesheet
    public function update(Request $request, Timesheet $timesheet)
    {
        // Ensure the timesheet belongs to the authenticated user
        if ($timesheet->task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'date' => 'required|date',
            'hours_worked' => 'required|numeric|min:0|max:24',
            'comments' => 'nullable|string'
        ]);

        // Ensure the task belongs to the authenticated user
        $task = Task::where('id', $request->task_id)->where('user_id', Auth::id())->first();
        if (!$task) {
            return redirect()->back()->withErrors(['task_id' => 'Invalid task selected.']);
        }

        $timesheet->update($request->all());
        return redirect()->route('timesheets.index')->with('success', 'Timesheet updated successfully.');
    }

    // Delete timesheet
    public function destroy(Timesheet $timesheet)
    {
        // Ensure the timesheet belongs to the authenticated user
        if ($timesheet->task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $timesheet->delete();
        return redirect()->route('timesheets.index')->with('success', 'Timesheet deleted successfully.');
    }
}