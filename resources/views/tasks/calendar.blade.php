@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="text-purple">📅 Smart Calendar</h2>

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
            },
            eventClassNames: function(info) {
                return ['fc-event', 'fc-event-' + info.event.extendedProps.priority];
            }
        });

        calendar.render();
    });
</script>

<style>
    /* Custom Purple Theme */
   
    h2.text-purple {
        color:rgb(144, 55, 199); /* Deep Purple */
        font-weight: bold;
    }

    /* Calendar Container */
    #calendar {
        background-color:rgb(245, 231, 218);
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Event styling based on priority */
    .fc-event-urgent {
        background-color: #9c27b0; /* Purple */
        border-color: #7b1fa2;
        color: white;
    }

    .fc-event-important {
        background-color: #ba68c8; /* Light Purple */
        border-color: #9c27b0;
        color: white;
    }

    .fc-event-secondary {
        background-color: #d1c4e9; /* Lighter Purple */
        border-color: #9c27b0;
        color: black;
    }

    /* Hover effects on events */
    .fc-event:hover {
        opacity: 0.8;
    }

    /* Header and Navigation Buttons */
    .fc-prev-button, .fc-next-button, .fc-today-button {
        background-color: #9c27b0;
        border-radius: 50%;
        color: white;
    }

    .fc-prev-button:hover, .fc-next-button:hover, .fc-today-button:hover {
        background-color: #7b1fa2;
    }

    .fc-toolbar-title {
        color: #6a1b9a; /* Deep Purple */
        font-size: 24px;
        font-weight: bold;
    }

    .fc-button-primary {
        background-color: #9c27b0;
        border-color: #7b1fa2;
        color: white;
    }

    .fc-button-primary:hover {
        background-color: #7b1fa2;
        border-color: #6a1b9a;
    }
</style>
@endsection
