<?php

namespace App\Http\Controllers;

use App\Models\Timesheet;
use App\Models\Task;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    // Show all timesheets
    public function index()
    {
        $timesheets = Timesheet::with('task')->orderBy('date', 'desc')->paginate(10);
        return view('timesheets.index', compact('timesheets'));
    }

    // Show create form
    public function create()
    {
        $tasks = Task::all(); // To select a task from dropdown
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

        Timesheet::create($request->all());
        return redirect()->route('timesheets.index')->with('success', 'Timesheet entry created successfully.');
    }

    // Show edit form
    public function edit(Timesheet $timesheet)
    {
        $tasks = Task::all();
        return view('timesheets.edit', compact('timesheet', 'tasks'));
    }

    // Update timesheet
    public function update(Request $request, Timesheet $timesheet)
    {
        $request->validate([
            'task_id' => 'required|exists:tasks,id',
            'date' => 'required|date',
            'hours_worked' => 'required|numeric|min:0|max:24',
            'comments' => 'nullable|string'
        ]);

        $timesheet->update($request->all());
        return redirect()->route('timesheets.index')->with('success', 'Timesheet updated successfully.');
    }

    // Delete timesheet
    public function destroy(Timesheet $timesheet)
    {
        $timesheet->delete();
        return redirect()->route('timesheets.index')->with('success', 'Timesheet deleted successfully.');
    }
}
