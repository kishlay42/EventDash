@extends('layout')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-5 fw-bold" style="color: #343a40;">🚀 Dashboard Overview</h2>

    <!-- Modern Summary Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card border-0 shadow-lg text-white" style="background: linear-gradient(135deg, #1e3c72, #2a5298); border-radius: 1rem;">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Events</h5>
                    <h2 class="fw-bold display-6">{{ $totalTasks }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-lg text-white" style="background: linear-gradient(135deg, #00b09b, #96c93d); border-radius: 1rem;">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Hours Logged</h5>
                    <h2 class="fw-bold display-6">{{ $totalHours }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-lg text-white" style="background: linear-gradient(135deg, #f7971e, #ffd200); border-radius: 1rem;">
                <div class="card-body text-center">
                    <h5 class="card-title">Pending Events</h5>
                    <h2 class="fw-bold display-6">{{ $taskStatus['Pending'] ?? 0 }}</h2>
                </div>
            </div>
        </div>
    </div>

    <!-- Modern Chart Card -->
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg border-0" style="border-radius: 1rem;">
                <div class="card-body p-5">
                    <h5 class="text-center mb-4 fw-semibold" style="color: #343a40;">📈 Event Status Distribution</h5>
                    <div class="d-flex justify-content-center">
                        <div style="height: 300px; width: 300px;">
                            <canvas id="taskStatusChart"></canvas>
                        </div>
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
            type: 'doughnut',
            data: {
                labels: Object.keys(statusData),
                datasets: [{
                    label: 'Tasks',
                    data: Object.values(statusData),
                    backgroundColor: [
                        '#f39c12',  // Pending
                        '#2980b9',  // In Progress
                        '#27ae60',  // Completed
                        '#e74c3c'   // Overdue/Other
                    ],
                    borderWidth: 2,
                    borderColor: '#fff',
                }]
            },
            options: {
                responsive: true,
                cutout: '70%',
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
