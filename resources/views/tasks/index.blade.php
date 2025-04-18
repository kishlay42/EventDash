@extends('layout')

@section('content')
<!-- Hero Section -->
<div class="bg-primary text-white text-center py-5 rounded shadow-sm mb-4 hero-section">
    <h1 class="fw-bold">📋 Manage Your Tasks</h1>
    <p class="lead">Organize, prioritize, and track your tasks efficiently.</p>
</div>

<!-- Filter Options -->
<div class="card mb-4 shadow-sm">
    <div class="card-body">
        <h5 class="card-title">Filter Tasks</h5>
        <form method="GET" action="{{ route('tasks.index') }}" class="row g-3">
            <!-- Priority Filter -->
            <div class="col-md-4">
                <label for="priority" class="form-label">Priority</label>
                <select name="priority" id="priority" class="form-select">
                    <option value="">All Priorities</option>
                    @foreach ($priorityOptions as $option)
                        <option value="{{ $option }}" {{ request('priority') == $option ? 'selected' : '' }}>
                            {{ ucfirst($option) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Status Filter -->
            <div class="col-md-4">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="">All Statuses</option>
                    @foreach ($statusOptions as $option)
                        <option value="{{ $option }}" {{ request('status') == $option ? 'selected' : '' }}>
                            {{ ucfirst($option) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Apply Button -->
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
            </div>
        </form>
    </div>
</div>

<!-- Task List -->
<div class="row">
    @forelse($tasks as $task)
        <div class="col-md-4">
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title">{{ $task->name }}</h5>
                    <p class="card-text">{{ $task->description }}</p>
                    <p class="card-text">
                        <span class="badge bg-{{ $task->priority == 'urgent' ? 'danger' : ($task->priority == 'important' ? 'warning' : 'secondary') }}">
                            {{ ucfirst($task->priority) }}
                        </span>
                        <small class="text-muted">Due: {{ $task->due_date }}</small>
                    </p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-info text-center">No tasks found.</div>
        </div>
    @endforelse
</div>

<!-- Pagination -->
<div class="d-flex justify-content-center mt-4">
    {{ $tasks->links() }}
</div>
@endsection