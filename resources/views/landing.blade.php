<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to TaskIt</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(to right, #f8f9fa, #e0f7fa);
            color: #333;
        }
        .hero {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            color: white;
            padding: 120px 0 100px;
            text-align: center;
        }
        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .hero p {
            font-size: 1.25rem;
            opacity: 0.95;
        }
        .hero .btn {
            margin-top: 30px;
            padding: 12px 36px;
            font-size: 1.1rem;
            border-radius: 50px;
            transition: all 0.3s ease;
        }
        .hero .btn-outline-light:hover {
            background-color: white;
            color: #2575fc;
        }

        .features {
            padding: 80px 0;
        }
        .features h2 {
            text-align: center;
            font-weight: 700;
            font-size: 2.5rem;
            margin-bottom: 60px;
            color: #333;
        }
        .feature-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            background-color: #ffffff;
        }
        .feature-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        }
        .feature-card i {
            font-size: 3rem;
            margin-bottom: 15px;
        }
        .feature-card h5 {
            font-weight: 600;
        }

        .cta {
            background: linear-gradient(135deg, #28a745, #218838);
            color: white;
            padding: 80px 0;
            text-align: center;
        }
        .cta h2 {
            font-size: 2.75rem;
            font-weight: 700;
        }
        .cta p {
            font-size: 1.25rem;
            margin-top: 15px;
        }
        .cta .btn {
            margin-top: 30px;
            padding: 12px 36px;
            font-size: 1.1rem;
            border-radius: 50px;
        }

        footer {
            background-color: #121212;
            color: #ccc;
            padding: 20px 0;
        }
        footer p {
            margin: 0;
            font-size: 0.95rem;
        }
    </style>
</head>
<body>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Welcome to TaskIt</h1>
            <p>Your ultimate task management solution to stay organized and productive.</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap mt-4">
                <a href="{{ route('signup') }}" class="btn btn-light text-primary fw-semibold">Get Started</a>
                <a href="{{ route('login') }}" class="btn btn-outline-light fw-semibold">Login</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2>Why Choose TaskIt?</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card feature-card p-4 text-center">
                        <i class="bi bi-kanban-fill text-primary"></i>
                        <h5 class="mt-3">Task Management</h5>
                        <p class="text-muted">Easily create, update, and track your tasks with our intuitive interface.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card p-4 text-center">
                        <i class="bi bi-calendar-event-fill text-success"></i>
                        <h5 class="mt-3">Calendar Integration</h5>
                        <p class="text-muted">View your tasks on a calendar and never miss a deadline again.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card p-4 text-center">
                        <i class="bi bi-bar-chart-fill text-warning"></i>
                        <h5 class="mt-3">Interactive Reports</h5>
                        <p class="text-muted">Analyze your productivity with detailed charts and reports.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call-to-Action Section -->
    <section class="cta">
        <div class="container">
            <h2>Ready to Boost Your Productivity?</h2>
            <p>Join thousands of users who trust TaskIt to manage their tasks efficiently.</p>
            <a href="{{ route('signup') }}" class="btn btn-light text-dark fw-semibold">Sign Up Now</a>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container text-center">
            <p>&copy; {{ date('Y') }} TaskIt. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
