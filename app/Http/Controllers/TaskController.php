<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    

    public function index(Request $request)
    {
        $query = Task::query();
    
        // Apply priority filter if provided
        if ($request->has('priority') && $request->priority) {
            if (in_array($request->priority, ['important', 'urgent', 'normal'])) {
                $query->where('priority', $request->priority);
            }
        }
    
        // Apply status filter if provided
        if ($request->has('status') && $request->status) {
            $query->where('status', $request->status);
        }
    
        // Fetch tasks
        $tasks = $query->orderBy('due_date', 'asc')->paginate(10);
    
        // Define filter options
        $priorityOptions = ['important', 'urgent', 'normal'];
        $statusOptions = ['Pending', 'In Progress', 'Completed'];
    
        // Pass tasks and filter options to the view
        return view('tasks.index', compact('tasks', 'priorityOptions', 'statusOptions'));
    }

public function calendar()
{
    $tasks = Task::all(); // Or use your existing filtering logic
    return view('tasks.calendar', compact('tasks'));
}
    public function create()
    {
        return view('tasks.create');
    }


public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'status' => 'required|string',
        'due_date' => 'nullable|date',
        'priority' => 'required|string|in:normal,important,urgent',
        'description' => 'nullable|string',
    ]);

    Task::create($request->all());
    return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
}

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required'
        ]);

        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
