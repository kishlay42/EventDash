@extends('layout')

@section('content')
<div class="container mt-4">
    <h2 class="text-black">📊 Reports & Charts</h2>

    <!-- ✅ Export Button -->
    <a href="{{ route('export.timesheets') }}" class="btn btn-success mb-3">
        📥 Export Timesheets (Excel)
    </a>

    <div class="row">
        <div class="col-md-6 d-flex justify-content-center">
            <div class="chart-container">
                <canvas id="taskStatusChart"></canvas>
            </div>
        </div>
        <div class="col-md-6 d-flex justify-content-center">
            <div class="chart-container">
                <canvas id="hoursPerTaskChart"></canvas>
            </div>
        </div>
    </div>

    <div class="mt-5 d-flex justify-content-center">
        <div class="chart-container-large">
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
                        backgroundColor: ['#FFB6C1', '#87CEFA', '#98FB98'], // Light pink, light blue, light green
                        borderColor: '#000', // Black border for all slices
                        borderWidth: 1
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
                        backgroundColor: '#FFD700', // Gold bars
                        borderColor: '#000', // Black border for bars
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Allow custom dimensions
                    scales: {
                        x: {
                            ticks: {
                                color: '#000' // Black text for x-axis labels
                            }
                        },
                        y: {
                            ticks: {
                                color: '#000' // Black text for y-axis labels
                            }
                        }
                    }
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
                        borderColor: '#FF6347', // Tomato red line
                        backgroundColor: '#FFE4B5', // Moccasin for points
                        pointBackgroundColor: '#000', // Black points
                        tension: 0.1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Allow custom dimensions
                    scales: {
                        x: {
                            ticks: {
                                color: '#000' // Black text for x-axis labels
                            }
                        },
                        y: {
                            ticks: {
                                color: '#000' // Black text for y-axis labels
                            }
                        }
                    }
                }
            });
        });
});
</script>

<style>
    /* Page Title */
    h2.text-black {
        color: black; /* Match navbar text color */
        font-weight: bold;
    }

    /* Export Button */
    .btn-success {
        background-color: #87CEEB; /* Light blue */
        border: none;
        color: black; /* Black text */
        font-weight: 600;
    }

    .btn-success:hover {
        background-color: #B0E0E6; /* Powder blue on hover */
        color: black; /* Ensure text remains black */
    }

    /* Chart Containers */
    .chart-container, .chart-container-large {
        background-color: #F5F5F5; /* Light gray background */
        border: 1px solid #D3D3D3; /* Light gray border */
        border-radius: 10px;
        padding: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    }

    .chart-container-large {
        width: 500px;
        height: 300px;
    }

    .chart-container {
        width: 300px;
        height: 300px;
    }
</style>
@endsection