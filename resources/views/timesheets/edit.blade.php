@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Timesheet Entry</h2>

    <form method="POST" action="{{ route('timesheets.update', $timesheet->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Task</label>
            <select name="task_id" class="form-control" required>
                @foreach($tasks as $task)
                    <option value="{{ $task->id }}" {{ $timesheet->task_id == $task->id ? 'selected' : '' }}>
                        {{ $task->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Date</label>
            <input type="date" name="date" class="form-control" value="{{ $timesheet->date }}" required>
        </div>

        <div class="mb-3">
            <label>Hours Worked</label>
            <input type="number" name="hours_worked" class="form-control" step="0.1" min="0" max="24" value="{{ $timesheet->hours_worked }}" required>
        </div>

        <div class="mb-3">
            <label>Comments</label>
            <textarea name="comments" class="form-control">{{ $timesheet->comments }}</textarea>
        </div>

        <button class="btn btn-primary">Update</button>
        <a href="{{ route('timesheets.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
@endsection
