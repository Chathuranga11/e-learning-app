<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Subject</title>
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
            <h1>Edit Subject</h1>
        </div>
        <div class="form-container">
            <form action="{{ route('subjects.update', $subject->id) }}" method="POST">
                @csrf
                @method('PUT')
                <label for="name">Subject Name:</label>
                <input type="text" name="name" id="name" value="{{ $subject->name }}" placeholder="Enter subject name" required>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-warning btn-custom">Update Subject</button>
                </div>
            </form>
        </div>
        <div class="footer-text">
            <p>All rights reserved for NC Labs © 2024</p>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
