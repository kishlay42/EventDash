@extends('layout')
@section('content')
<div class="container mt-4">
    <h2>Edit Task</h2>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group mb-2">
            <label>Name:</label>
            <input type="text" name="name" value="{{ $task->name }}" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>Status:</label>
            <select name="status" class="form-control">
                <option {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option {{ $task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>
        <div class="form-group mb-2">
            <label>Description:</label>
            <textarea name="description" class="form-control">{{ $task->description }}</textarea>
        </div>
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
