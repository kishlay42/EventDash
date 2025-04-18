@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>📅 Task Calendar</h2>

    <!-- Calendar -->
    <div id="calendar"></div>
</div>
@endsection

@section('scripts')
<!-- FullCalendar Scripts -->
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@6.1.8/index.global.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@6.1.8/index.global.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        // Define calendar events from tasks
        var calendarEvents = {!! json_encode($tasks->map(function ($task) {
            return [
                'id' => $task->id,
                'title' => $task->name,
                'start' => $task->due_date,
                'classNames' => ['fc-event-' . strtolower($task->priority)], // Add priority-based class
                'extendedProps' => [
                    'status' => $task->status,
                    'priority' => $task->priority,
                ],
            ];
        })) !!};

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,dayGridWeek,dayGridDay'
            },
            events: calendarEvents,
            eventClick: function(info) {
                // Redirect to task edit page when an event is clicked
                window.location.href = "{{ url('/tasks') }}/" + info.event.id + "/edit";
            },
            dateClick: function(info) {
                // Redirect to task creation form with pre-filled date
                window.location.href = "{{ route('tasks.create') }}?date=" + info.dateStr;
            }
        });

        calendar.render();
    });
</script>
@endsection