@extends('layout')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h2 class="text-center mb-4"><i class="bi bi-plus-circle"></i> Create Event</h2>
        <form action="{{ route('tasks.store') }}" method="POST" data-aos="fade-up">
            @csrf
            <!-- Task Name -->
            <div class="form-group mb-3">
                <label for="name" class="form-label"><i class="bi bi-card-text"></i> Event Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter task name" required>
            </div>

            <!-- Task Status -->
            <div class="form-group mb-3">
                <label for="status" class="form-label"><i class="bi bi-list-task"></i> Status</label>
                <select id="status" name="status" class="form-select">
                    <option value="Pending">Pending</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>

            <!-- Due Date -->
            <div class="form-group mb-3">
                <label for="due_date" class="form-label"><i class="bi bi-calendar-event"></i> Due Date</label>
                <input type="date" id="due_date" name="due_date" class="form-control" value="{{ request('date') }}" required>
            </div>

            <!-- Priority -->
            <div class="form-group mb-3">
                <label for="priority" class="form-label"><i class="bi bi-exclamation-circle"></i> Priority</label>
                <select id="priority" name="priority" class="form-select">
                    <option value="normal">Normal</option>
                    <option value="important">Important</option>
                    <option value="urgent">Urgent</option>
                </select>
            </div>

            <!-- Description -->
            <div class="form-group mb-3">
                <label for="description" class="form-label"><i class="bi bi-chat-text"></i> Description</label>
                <textarea id="description" name="description" class="form-control" rows="4" placeholder="Enter task description"></textarea>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('tasks.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Back</a>
                <button type="submit" class="btn btn-success"><i class="bi bi-save"></i> Save Event</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<!-- AOS Animation Library -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>
@endsection