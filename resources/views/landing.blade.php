<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome to EventDash</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to right, #fffaf0, #ffe4e1);
            color: #333;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(255, 126, 95, 0.65),
                    rgba(254, 180, 123, 0.75)),
                url('https://i.pinimg.com/736x/c7/47/70/c7477038ebb21e1378063495df465b09.jpg') no-repeat center center;
            background-size: cover;
            color: white;
            padding: 100px 0;
            text-align: center;
            border-radius: 1rem;
        }

        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
        }

        .hero p {
            font-size: 1.2rem;
            margin-top: 10px;
        }

        .hero .btn {
            margin-top: 30px;
            padding: 12px 36px;
            font-size: 1.1rem;
            border-radius: 50px;
            transition: 0.3s ease;
        }

        .hero .btn:hover {
            background-color: white;
            color: #ff7e5f;
        }

        /* Features Section */
        .features {
            padding: 80px 0;
        }

        .features h2 {
            text-align: center;
            font-size: 2.75rem;
            font-weight: 700;
            margin-bottom: 60px;
            color: #343a40;
        }

        .feature-card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }

        .feature-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
        }

        .feature-card img {
            width: 100%;
            height: 180px;
            object-fit: cover;
        }

        .feature-card-body {
            padding: 20px;
            text-align: center;
        }

        .feature-card-body h5 {
            font-weight: 600;
            margin-bottom: 10px;
            color: #343a40;
        }

        .feature-card-body p {
            color: #6c757d;
        }

        /* Call-to-Action Section */
        .cta {
            background: linear-gradient(135deg, #f2994a, #f2c94c);
            color: #212121;
            padding: 80px 0;
            text-align: center;
            border-radius: 1rem;
        }

        .cta h2 {
            font-size: 2.5rem;
            font-weight: 700;
        }

        .cta p {
            font-size: 1.2rem;
            margin-top: 10px;
        }

        .cta .btn {
            margin-top: 30px;
            padding: 12px 36px;
            font-size: 1.1rem;
            border-radius: 50px;
        }

        /* Footer */
        footer {
            background-color: #222;
            color: #bbb;
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
    <section class="hero mb-5">
        <div class="container">
            <h1>Welcome to EventDash</h1>
            <p>The ultimate solution to manage your events, tasks, and goals effortlessly.</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ route('signup') }}" class="btn btn-light text-dark fw-semibold">Get Started</a>
                <a href="{{ route('login') }}" class="btn btn-outline-light fw-semibold border-white">Login</a>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2>Why Choose EventDash?</h2>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card feature-card">
                        <img src="https://i.pinimg.com/736x/9a/fa/65/9afa65aa52f9d92bedc1c1a98735440c.jpg" alt="Event Management" />
                        <div class="feature-card-body">
                            <h5>Smart Daily Event Management</h5>
                            <p>Organize your workflow efficiently with intuitive on-click calendar features.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card">
                        <img src="https://i.pinimg.com/736x/51/75/bd/5175bdbc00bc637a9cb9c29ae814e0e4.jpg" alt="Calendar Integration" />
                        <div class="feature-card-body">
                            <h5>Seamless Calendar Sync</h5>
                            <p>Stay on top of your schedule by syncing events directly to your calendar.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card feature-card">
                        <img src="https://i.pinimg.com/736x/11/2a/ab/112aab22997e581e1c6e219ffdf06ffd.jpg" alt="Reports" />
                        <div class="feature-card-body">
                            <h5>Insightful Analytics</h5>
                            <p>Track your productivity and make data-driven decisions with smart reports.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call-to-Action -->
    <section class="cta mt-5">
        <div class="container">
            <h2>Boost Your Efficiency Today</h2>
            <p>Thousands have already streamlined their work with EventDash. You should too.</p>
            <a href="{{ route('signup') }}" class="btn btn-dark fw-semibold">Join Now</a>
        </div>
    </section>

    <!-- Footer -->
    <footer class="mt-5">
        <div class="container text-center">
            <p>&copy; {{ date('Y') }} EventDash. Built with passion and productivity.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>