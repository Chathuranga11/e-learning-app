<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            overflow-x: hidden;
            background-color: #FFCC00; /* Match color of student registration/login */
        }

        .sidebar {
            width: 250px;
            background-color: #ffffff;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            height: 100%;
            transition: transform 0.3s ease;
            z-index: 1000;
            transform: translateX(-100%); /* Hide sidebar by default on mobile */
        }

        .sidebar.active {
            transform: translateX(0); /* Show sidebar */
        }

        .close-btn, .open-btn {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
        }

        .open-btn {
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 1100;
        }

        .sidebar-content {
            padding: 20px;
        }

        .sidebar-header p {
            font-weight: bold;
            color: #FFA500;
        }

        .nav-link {
            color: #333;
            font-weight: 600;
            margin-bottom: 10px;
            border: 1px solid #FFA500; /* Border for sidebar items */
            border-radius: 5px;
            padding: 10px;
        }

        .nav-link:hover {
            background-color: #FFA500;
            color: #ffffff;
        }

        .main-content {
            margin-left: 0;
            padding: 20px;
            flex-grow: 1;
            transition: margin-left 0.3s ease;
        }

        @media (min-width: 768px) {
            .sidebar {
                transform: translateX(0); /* Show sidebar by default on larger screens */
            }

            .main-content {
                margin-left: 250px;
            }
        }
    </style>
</head>
<body>
    <!-- Button to open the sidebar -->
    <button class="open-btn" id="openSidebarBtn" onclick="toggleSidebar()">☰</button>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar" id="sidebar">
            <button class="close-btn" onclick="toggleSidebar()">×</button>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            
            <div class="sidebar-content">
                <div class="sidebar-header">
                    <p>Teacher ID : CHD 0123</p> <!-- Update dynamically with teacher ID -->
                </div>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('notifications') }}">Notifications</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teacher.dashboard') }}">My Wall</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('lessons.create') }}">Publish a New Class</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tutory.timetable') }}">Tutory Time Table</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('lessons.index') }}">Published Lessons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('go.registry') }}">Go to Registry</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teacher.archived.lessons') }}">Archived Lessons</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teacher.dashboard') }}">Teachers Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('available.balance') }}">Available Balance</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('teacher.profile') }}">My Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
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
                <!-- Yield to content -->
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Function to toggle the sidebar visibility
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('active');
            document.getElementById('openSidebarBtn').classList.toggle('d-none');
        }

        // Adjust the open button visibility based on the sidebar state
        document.getElementById('sidebar').addEventListener('transitionend', function() {
            if (document.getElementById('sidebar').classList.contains('active')) {
                document.getElementById('openSidebarBtn').classList.add('d-none');
            } else {
                document.getElementById('openSidebarBtn').classList.remove('d-none');
            }
        });
    </script>
</body>
</html>