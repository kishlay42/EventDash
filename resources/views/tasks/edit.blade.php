@extends('layout')

@section('content')
<div class="container mt-5">
    <h2 class="text-purple">Edit Event</h2>
    <form action="{{ route('tasks.update', $task->id) }}" method="POST" class="bg-light p-4 rounded-lg shadow-sm">
        @csrf @method('PUT')
        <div class="form-group mb-3">
            <label class="text-purple" for="name">Event Name:</label>
            <input type="text" name="name" value="{{ $task->name }}" class="form-control" id="name" required>
        </div>
        <div class="form-group mb-3">
            <label class="text-purple" for="status">Status:</label>
            <select name="status" class="form-control" id="status">
                <option {{ $task->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option {{ $task->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                <option {{ $task->status == 'Completed' ? 'selected' : '' }}>Completed</option>
            </select>
        </div>
        <div class="form-group mb-3">
            <label class="text-purple" for="description">Description:</label>
            <textarea name="description" class="form-control" id="description">{{ $task->description }}</textarea>
        </div>
        <button class="btn btn-danger w-100 mt-3">Update Event</button>
    </form>
</div>
@endsection


