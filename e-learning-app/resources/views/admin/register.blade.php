<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <!-- Include your CSS and other head elements -->
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
        .btn-custom {
            padding: 15px 30px;
            font-size: 18px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="main-container">
        <h1>Admin Registration</h1>
        <form method="POST" action="{{ route('admin.store') }}">
            @csrf
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email Id:</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="mobile">WhatsApp Mobile No.:</label>
                <input type="text" id="mobile" name="mobile" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" id="city" name="city" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-custom mt-3">Register</button>
        </form>
    </div>
</body>
</html>
