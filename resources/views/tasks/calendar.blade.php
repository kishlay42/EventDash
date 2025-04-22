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
        color: rgb(199, 165, 55); /* Deep Purple */
        font-weight: bold;
    }

    /* Calendar Container */
    #calendar {
        background: linear-gradient(rgba(178, 208, 251, 0.65),
                    rgba(202, 255, 187, 0.25)),
                url('https://i.pinimg.com/736x/48/0c/ef/480cefea0e8a2b9b6a99b9ef6d17d4ee.jpg') no-repeat center center;
        background-size: cover;
        background-position: center;
        border-radius: 50px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        color: black; /* Set default font color to black */
    }

    /* FullCalendar Header Toolbar */
    .fc-toolbar {
        background-color: #f8f9fa;
        border-radius: 10px;
        padding: 10px;
        margin-bottom: 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* FullCalendar Day Cells */
    .fc-daygrid-day {
        background-color: rgba(248, 247, 247, 0.8);
        border-radius: 20px;
        color: black; /* Ensure day cell text is black */
    }

    /* Ensure day numbers have black font color */
    .fc .fc-daygrid-day-number {
        color: black !important; /* Force black font color for day numbers */
    }

    /* Override the default link color inside the calendar */
    .fc a {
        color: black !important; /* Force black font color for links in the calendar */
        text-decoration: none; /* Remove underline if not needed */
    }

    /* Highlight Today's Date */
   
    /* Event Styles */
    .fc-event {
        font-size: 14px;
        font-weight: bold;
        border-radius: 5px;
        padding: 5px;
        color: black !important; /* Force black font color for events */
    }

    /* Priority-Based Event Colors */
    .fc-event-urgent {
        background-color: #dc3545 !important; /* Red for urgent tasks */
        color: black !important; /* Black text for urgent tasks */
    }

    .fc-event-important {
        background-color: #ffc107 !important; /* Yellow for important tasks */
        color: black !important; /* Black text for important tasks */
    }

    .fc-event-normal {
        background-color: #6c757d !important; /* Gray for normal tasks */
        color: black !important; /* Black text for normal tasks */
    }
</style>
@endsection