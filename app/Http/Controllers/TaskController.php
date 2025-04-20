<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TaskReminderNotification;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $query = Task::where('user_id', Auth::id()); // Fetch tasks only for the authenticated user

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

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string',
            'due_date' => 'nullable|date',
            'priority' => 'required|string|in:normal,important,urgent',
            'description' => 'nullable|string',
        ]);

        // Associate the task with the authenticated user
        $task = Auth::user()->tasks()->create([
            'name' => $request->name,
            'status' => $request->status,
            'due_date' => $request->due_date,
            'priority' => $request->priority,
            'description' => $request->description,
        ]);

        // Send task reminder notification
        Notification::send(Auth::user(), new TaskReminderNotification($task));

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

        // Ensure only the owner can update the task
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        // Ensure only the owner can delete the task
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    public function create()
    {
        return view('tasks.create'); // Ensure you have a `tasks/create.blade.php` view
    }
}