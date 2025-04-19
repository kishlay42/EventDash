<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- AOS Animation CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Inter', sans-serif;
        }
        .card {
            border-radius: 1rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }
        .btn-primary {
            background: linear-gradient(135deg, #6a11cb, #2575fc);
            border: none;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #2575fc, #6a11cb);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4" data-aos="fade-up">
                    <h2 class="text-center mb-4">Login</h2>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                    <div class="text-center mt-3">
                        <a href="{{ route('signup') }}" class="text-decoration-none">Don't have an account? Sign up</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS Animation JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>