
@extends('layout')

@section('content')
<div class="container mt-4">
    <h2>📊 Reports & Charts</h2>

    <!-- ✅ Export Button -->
    <a href="{{ route('export.timesheets') }}" class="btn btn-success mb-3">
        📥 Export Timesheets (Excel)
    </a>

    <div class="row">
        <div class="col-md-6 d-flex justify-content-center">
            <div style="width: 300px; height: 300px;">
                <canvas id="taskStatusChart"></canvas>
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
            <div style="width: 300px; height: 300px;">
                <canvas id="hoursPerTaskChart"></canvas>
            </div>
        </div>
    </div>

    <div class="mt-5 d-flex justify-content-center">
        <div style="width: 500px; height: 300px;">
            <canvas id="dailyHoursChart"></canvas>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    fetch("{{ route('report.data') }}")
        .then(response => response.json())
        .then(data => {
            // Pie chart: Task status
            new Chart(document.getElementById('taskStatusChart'), {
                type: 'pie',
                data: {
                    labels: Object.keys(data.taskStatus),
                    datasets: [{
                        label: 'Task Status',
                        data: Object.values(data.taskStatus),
                        backgroundColor: ['#f39c12', '#3498db', '#2ecc71'],
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Allow custom dimensions
                }
            });

            // Bar chart: Hours per task
            new Chart(document.getElementById('hoursPerTaskChart'), {
                type: 'bar',
                data: {
                    labels: Object.keys(data.hoursPerTask),
                    datasets: [{
                        label: 'Hours per Task',
                        data: Object.values(data.hoursPerTask),
                        backgroundColor: '#3498db'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Allow custom dimensions
                }
            });

            // Line chart: Daily activity
            new Chart(document.getElementById('dailyHoursChart'), {
                type: 'line',
                data: {
                    labels: Object.keys(data.dailyHours),
                    datasets: [{
                        label: 'Daily Hours Logged',
                        data: Object.values(data.dailyHours),
                        fill: false,
                        borderColor: '#2ecc71',
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Allow custom dimensions
                }
            });
        });
});
</script>
@endsection