<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/sidebars.css') }}"> <!-- Update the path -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <button class="close-btn" onclick="toggleSidebar()">×</button>
            <div class="sidebar-content">
                <div class="sidebar-header">
                    <p>Student ID : CHD 0123</p> <!-- Update dynamically with student ID -->
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('notifications') }}">Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('cart') }}">My Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('filter.teacher') }}">Filter Teacher</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('timetable') }}">Tutory Time Table</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('active.lesson') }}">Active Lesson</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('video.on.demand') }}">Video On Demand</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('profile') }}">My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}">Logout</a>
                    </li>
                </ul>
                <div class="sidebar-footer">
                    <p>Registered students: 95,000</p> <!-- Update dynamically if needed -->
                </div>
            </div>
        </div>

        <!-- Main content area -->
        <div class="main-content">
            <div class="container mt-4">
                <!-- Welcome Message with Animation -->
                <div class="welcome-message">
                    <h2>Hi, {{ auth('student')->user()->first_name }}!</h2>
                    <p>Welcome to NC Tutorial Services!</p>
                    <p>We're excited to have you on board. This platform is designed to make learning accessible, engaging, and efficient. Whether you're here to enhance your skills, explore new subjects, or prepare for your next big opportunity, we've got you covered. Dive into our diverse range of courses, connect with expert instructors, and join a community of learners just like you. Your journey to knowledge starts here—let's learn, grow, and succeed together!</p>
                    <p>Happy learning! 🎓✨</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap and Sidebar JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="path/to/sidebars.js"></script> <!-- Update the path -->
    <script>
        // Function to toggle the sidebar visibility
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
        }
    </script>
</body>
</html>
