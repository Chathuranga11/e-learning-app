<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile</title>
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
            background-color: #FFA500;
            border: none;
            color: white;
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
    @extends('layouts.student')

    @section('title', 'My Profile')
    
    @section('content')
        <div class="main-container">
            <h1>My Profile</h1>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="form-container">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label for="first_name">First Name :</label>
                            <input type="text" id="first_name" name="first_name" value="{{ $student->first_name }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="last_name">Last Name :</label>
                            <input type="text" id="last_name" name="last_name" value="{{ $student->last_name }}" readonly>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="email">Email Id :</label>
                            <input type="email" id="email" name="email" value="{{ $student->email }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="mobile">WhatsApp Mobile No. :</label>
                            <input type="text" id="mobile" name="mobile" value="{{ $student->mobile }}" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="school">School/University Name :</label>
                            <input type="text" id="school" name="school" value="{{ $student->school }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="city">City :</label>
                            <input type="text" id="city" name="city" value="{{ $student->city }}" readonly>
                        </div>
                    </div>
                    <div class="text-center mt-4">
                        <button type="submit" class="btn btn-warning btn-custom">Update Contact Number</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection    
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
