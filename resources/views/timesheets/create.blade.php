@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Add Timesheet Entry</h2>

    <form method="POST" action="{{ route('timesheets.store') }}">
        @csrf

        <div class="mb-3">
            <label>Task</label>
            <select name="task_id" class="form-control" required>
                <option value="">Select Task</option>
                @foreach($tasks as $task)
                    <option value="{{ $task->id }}">{{ $task->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Hours Worked</label>
            <input type="number" name="hours_worked" class="form-control" step="0.1" min="0" max="24" required>
        </div>

        <div class="mb-3">
            <label>Comments</label>
            <textarea name="comments" class="form-control"></textarea>
        </div>

        <button class="btn btn-success">Submit</button>
        <a href="{{ route('timesheets.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
