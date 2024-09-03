<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FFCC00;
        }
        .main-container {
            text-align: center;
            padding: 50px;
            background-color: white;
            margin: auto;
            width: 100%;
            max-width: 800px;
            border-radius: 10px;
        }
        .logo {
            width: 150px;
            margin-bottom: 20px;
        }
        .btn-custom {
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 5px;
        }
        .footer-text {
            font-size: 14px;
            color: gray;
            margin-top: 20px;
        }
        .form-container {
            text-align: left;
            margin-top: 30px;
        }
        .form-container label {
            color: #FFA500;
        }
        .form-container input {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }
        .icon {
            width: 30px;
            margin-left: 10px;
        }
        .login-btn {
            background-color: #FFCC00;
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 5px;
            width: 100%;
        }
        .register-btn {
            background-color: white;
            color: #FFCC00;
            border: 2px solid #FFCC00;
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 5px;
            width: 100%;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <div class="text-center">
            <img src="{{ asset('images/logo.png') }}" alt="NC Labs Logo" class="logo">
        </div>
        <h1>Login</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="form-container">
            <form method="POST" action="{{ route('login.attempt') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email Id:</label>
                    <div class="input-group">
                        <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
                        <span class="input-group-text">
                            <img src="{{ asset('images/email-icon.png') }}" alt="Email Icon" class="icon">
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <div class="input-group">
                        <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required>
                        <span class="input-group-text">
                            <img src="{{ asset('images/password-icon.png') }}" alt="Password Icon" class="icon">
                        </span>
                    </div>
                </div>
                <a href="#" class="text-right d-block mb-3">Forgot password?</a>
                <button type="submit" class="login-btn">Login Now</button>
            </form>
            <div class="text-center mt-3">OR</div>
            <a href="{{ url('/register') }}" class="register-btn">Register Now</a>
        </div>
        <div class="footer-text mt-5">
            <p>If a teacher has offered a free lesson, you can click the above button to visit the classroom.</p>
            <p>All rights reserved for NC Labs © 2024</p>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
