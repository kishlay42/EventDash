@extends('layout')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-4">📊 Dashboard Overview</h2>

    <!-- Summary Cards -->
    <div class="row text-center mb-5">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 p-4" style="background: linear-gradient(135deg, #6a11cb, #2575fc); color: white;">
                <h5>Total Tasks</h5>
                <h2 class="fw-bold">{{ $totalTasks }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 p-4" style="background: linear-gradient(135deg, #28a745, #218838); color: white;">
                <h5>Total Hours Logged</h5>
                <h2 class="fw-bold">{{ $totalHours }}</h2>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 p-4" style="background: linear-gradient(135deg, #ffc107, #e0a800); color: white;">
                <h5>Pending Tasks</h5>
                <h2 class="fw-bold">{{ $taskStatus['Pending'] ?? 0 }}</h2>
            </div>
        </div>
    </div>

    <!-- Status Chart -->
    <!-- Status Chart -->
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0 p-4">
            <h5 class="text-center mb-4">Task Status Distribution</h5>
            <div class="d-flex justify-content-center">
                <div class="chart-container" style="position: relative; height: 300px; width: 300px;">
                    <canvas id="taskStatusChart"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const statusData = @json($taskStatus);

        new Chart(document.getElementById('taskStatusChart'), {
            type: 'pie',
            data: {
                labels: Object.keys(statusData),
                datasets: [{
                    label: 'Tasks',
                    data: Object.values(statusData),
                    backgroundColor: ['#f39c12', '#3498db', '#2ecc71', '#e74c3c'],
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 14
                            }
                        }
                    }
                }
            }
        });
    });
</script>
@endsection