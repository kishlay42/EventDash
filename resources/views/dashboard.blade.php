@extends('layout')

@section('content')
<div class="container mt-5">
    <h2 class="text-center mb-5 fw-bold" style="color: #343a40;">🚀 Dashboard Overview</h2>

    <!-- Modern Summary Cards -->
    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card border-0 shadow-lg text-white" style="background: linear-gradient(135deg, #FFB6C1, #FF69B4); border-radius: 1rem;">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Events</h5>
                    <h2 class="fw-bold display-6">{{ $totalTasks }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-lg text-white" style="background: linear-gradient(135deg, #87CEFA, #4682B4); border-radius: 1rem;">
                <div class="card-body text-center">
                    <h5 class="card-title">Total Hours Logged</h5>
                    <h2 class="fw-bold display-6">{{ $totalHours }}</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-0 shadow-lg text-white" style="background: linear-gradient(135deg, #98FB98, #32CD32); border-radius: 1rem;">
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
            <div class="card shadow-lg border-0" style="border-radius: 1rem; background-color: #F5F5F5;">
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
                        '#FFB6C1',  // Light Pink (Pending)
                        '#87CEFA',  // Light Blue (In Progress)
                        '#98FB98',  // Light Green (Completed)
                        '#FFD700'   // Gold (Overdue/Other)
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
                            },
                            color: '#343a40' // Dark gray text for legend
                        }
                    }
                }
            }
        });
    });
</script>

<style>
    /* Page Title */
    h2.text-center {
        color: #343a40; /* Dark gray */
        font-weight: bold;
    }

    /* Summary Cards */
    .card {
        border-radius: 1rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    }

    .card-title {
        font-size: 1.2rem;
        font-weight: 600;
    }

    .card-body {
        padding: 20px;
    }

    /* Chart Card */
    .card.shadow-lg {
        background-color: #F5F5F5; /* Light gray background */
        border: 1px solid #D3D3D3; /* Light gray border */
    }

    /* Chart Container */
    canvas {
        max-width: 100%;
        height: auto;
    }
</style>
@endsection