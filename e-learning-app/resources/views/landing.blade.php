<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Tutorial Services - Landing</title>
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
            width: 150px; /* Increase the logo size */
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
    </style>
</head>
<body>
    <div class="main-container">
        <img src="{{ asset('images/logo.png') }}" alt="NC Labs Logo" class="logo">
        <div class="mt-5">
            <a href="#" class="btn btn-danger btn-custom">Login</a>
            <a href="{{ url('/register') }}" class="btn btn-warning btn-custom">Register</a>
        </div>
        <div class="footer-text">
            <p>All rights reserved for NC Labs © 2024</p>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
