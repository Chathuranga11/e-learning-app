<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FFCC00;
        }
        .main-container {
            text-align: center;
            padding: 30px;
            background-color: white;
            margin: auto;
            width: 100%;
            max-width: 800px;
            border-radius: 10px;
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
    </style>
</head>
<body>
    <div class="main-container">
        <div class="text-center">
            <img src="{{ asset('images/logo.png') }}" alt="NC Labs Logo" style="width: 50px;">
            <h1>Student Registration</h1>
        </div>
        <div class="form-container">
            <form id="registrationForm" action="{{ route('students.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="first_name">First Name :</label>
                        <input type="text" id="first_name" name="first_name" placeholder="Enter your name.." required>
                    </div>
                    <div class="col-md-6">
                        <label for="last_name">Last Name :</label>
                        <input type="text" id="last_name" name="last_name" placeholder="Enter your name.." required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="email">Email Id :</label>
                        <input type="email" id="email" name="email" placeholder="info@xyz.com" required>
                    </div>
                    <div class="col-md-6">
                        <label for="mobile">WhatsApp Mobile No. :</label>
                        <input type="text" id="mobile" name="mobile" placeholder="+94 71 999 8888" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="password">Password :</label>
                        <input type="password" id="password" name="password" placeholder="xxxxxxxxxx" required>
                    </div>
                    <div class="col-md-6">
                        <label for="confirm_password">Confirm Password :</label>
                        <input type="password" id="confirm_password" name="password_confirmation" placeholder="xxxxxxxxxx" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="school">School/University Name :</label>
                        <input type="text" id="school" name="school" placeholder="Enter your school/university name" required>
                    </div>
                    <div class="col-md-6">
                        <label for="city">City :</label>
                        <input type="text" id="city" name="city" placeholder="Enter closest city" required>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-warning btn-custom">Register</button>
                </div>
            </form>
        </div>
        <div class="footer-text">
            <p>All rights reserved for NC Labs © 2024</p>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS for validation -->
    <script>
        document.getElementById('registrationForm').addEventListener('submit', function(event) {
            let valid = true;

            // Get form fields
            const emailField = document.getElementById('email');
            const mobileField = document.getElementById('mobile');
            const passwordField = document.getElementById('password');
            const confirmPasswordField = document.getElementById('confirm_password');

            // Email validation
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailField.value)) {
                alert('Please enter a valid email address.');
                valid = false;
            }

            // Mobile number validation
            const mobileRegex = /^(07|00947|\+947)\d{8}$/;
            if (!mobileRegex.test(mobileField.value)) {
                alert('Please enter a valid WhatsApp mobile number starting with 07, 00947, or +947 followed by 8 digits.');
                valid = false;
            }

            // Password match validation
            if (passwordField.value !== confirmPasswordField.value) {
                alert('Passwords do not match.');
                valid = false;
            }

            // Prevent form submission if validation fails
            if (!valid) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>
