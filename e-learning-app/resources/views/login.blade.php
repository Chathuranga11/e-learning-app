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
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group mt-3">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>
                <!-- Dropdown for User Type -->
                <div class="form-group mt-3">
                    <label for="user_type">Select User Type:</label>
                    <select id="user_type" name="user_type" class="form-control" required>
                        <option value="student">Student</option>
                        <option value="teacher">Teacher</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <!-- Error message (if any) -->
                @if(session('error'))
                    <div class="alert alert-danger mt-3">
                        {{ session('error') }}
                    </div>
                @endif
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
