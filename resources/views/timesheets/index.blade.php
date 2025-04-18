@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>Timesheet Entries</h2>

    <a href="{{ route('timesheets.create') }}" class="btn btn-primary mb-3">Add Timesheet</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Task</th>
                <th>Date</th>
                <th>Hours Worked</th>
                <th>Comments</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($timesheets as $timesheet)
            <tr>
                <td>{{ $timesheet->task->name ?? 'N/A' }}</td>
                <td>{{ $timesheet->date }}</td>
                <td>{{ $timesheet->hours_worked }}</td>
                <td>{{ $timesheet->comments }}</td>
                <td>
                    <a href="{{ route('timesheets.edit', $timesheet->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('timesheets.destroy', $timesheet->id) }}" method="POST" style="display:inline-block;">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')">Delete</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">No timesheet entries found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $timesheets->links() }}
</div>
@endsection
