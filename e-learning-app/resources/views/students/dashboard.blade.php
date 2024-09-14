<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FFCC00;
        }
        .main-container {
            margin-top: 20px;
            padding: 20px;
        }
        .navbar {
            background-color: #FFA500;
            padding: 10px;
        }
        .sidebar {
            background-color: #f1f1f1;
            padding: 20px;
            height: 100vh;
        }
        .sidebar .menu-item {
            background-color: #fff;
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .post-container {
            background-color: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }
        .footer-text {
            font-size: 14px;
            color: gray;
            margin-top: 20px;
        }
        .content-section {
            padding: 20px;
        }
        .top-buttons .btn {
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 50px;">
                <span>Student Dashboard</span>
            </a>
            <div class="ml-auto">
                <span>Student ID: {{ $student->id }}</span>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 sidebar">
                <div class="menu-item">Notifications</div>
                <div class="menu-item">My Cart</div>
                <div class="menu-item">Filter Teacher</div>
                <div class="menu-item">Tutory Time Table</div>
                <div class="menu-item">Active Lesson</div>
                <div class="menu-item">Video On Demand</div>
                <div class="menu-item">My Profile</div>
                <div class="menu-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>

            <!-- Content Section -->
            <div class="col-md-9 content-section">
                <!-- Top buttons -->
                <div class="top-buttons mb-4">
                    <button class="btn btn-light">Filter Teacher</button>
                    <button class="btn btn-light">Active Lesson</button>
                    <button class="btn btn-light">Video On Demand</button>
                    <button class="btn btn-danger">Free Lesson</button>
                </div>

                <!-- Posts or Lessons -->
                @foreach ($posts as $post)
                <div class="post-container">
                    <div class="post-header">
                        <h5>{{ $post->author }}</h5>
                        <small>{{ $post->created_at->diffForHumans() }} · Updated</small>
                    </div>
                    <p>{{ $post->content }}</p>
                    <img src="{{ asset('images/post-image.jpg') }}" alt="Post Image" class="img-fluid">
                    <div class="post-footer mt-2">
                        <span>❤️ 132</span>
                        <span>💬 4</span>
                        <span>🔁 45</span>
                    </div>
                </div>
                @endforeach

                <!-- Example Posts (Replace with dynamic content) -->
                <div class="post-container">
                    <div class="post-header">
                        <h5>Admin 01</h5>
                        <small>12hr · Updated</small>
                    </div>
                    <p>Dare to Dream? If you got the skills to keep an audience rocking and grooving with your sensational tunes. Date - 25th March 2023 Time - 4.00 p.m. onwards</p>
                    <img src="{{ asset('images/post-image.jpg') }}" alt="Post Image" class="img-fluid">
                    <div class="post-footer mt-2">
                        <span>❤️ 132</span>
                        <span>💬 4</span>
                        <span>🔁 45</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer-text text-center">
        <p>If a teacher has offered a free lesson, you can click the above button to visit the classroom.</p>
        <p>All rights reserved for NC Labs © 2024</p>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
