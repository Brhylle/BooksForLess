<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Admin Navigation</title> -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <link id="theme-link" rel="stylesheet" href="{{ asset('assets/css/admin_light_mode.css') }}">
    <style>
        .sidebar {
            background-color: var(--sidebar-bg);
            min-height: 100vh;
            transition: width 0.3s, background-color 0.3s;
            width: 250px;
            color: #a0aec0;
        }
        .sidebar.collapsed {
            width: 80px; 
        }
        .sidebar.collapsed .sidebar-text, 
        .sidebar.collapsed .brand {
            display: none;
        }
        .content {
            flex-grow: 1;
            transition: margin-left 0.3s;
            margin-left: 35px; 
        }
        .content.shifted {
            margin-left: 35px;
        }
        .button {
            padding: 0.5rem 1rem;
            background-color: var(--button-bg);
            border: none;
            cursor: pointer;
        }
        .top-nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
            position: sticky;
            top: 0;
            z-index: 10;
            height: 64px; 
        }
        .logo {
            width: 100px;
            height: 100px;
            transition: width 0.3s, height 0.3s;
        }
        .sidebar.collapsed .logo {
            width: 80px;
            height: 80px;
        }
        .sidebar ul {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: left;
        }
        .sidebar ul li {
            display: flex;
            align-items: center;
            padding: 1rem 0;
        }
        .sidebar ul li a {
            display: flex;
            align-items: center;
            width: 100%;
            padding: 0.5rem 1rem;
            transition: background-color 0.3s, color 0.3s;
            color: inherit;
        }
        .sidebar ul li a:hover {
            background-color: #4a5568;
            color: #edf2f7;
        }
        .sidebar.collapsed ul {
            text-align: center;
        }
        .sidebar.collapsed ul li {
            justify-content: center;
        }
        .sidebar.collapsed ul li a {
            justify-content: center;
        }
        .sidebar.collapsed ul li a .fas {
            margin-right: 0;
        }
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 100%;
            right: 0;
            border: 1px solid var(--border-color);
            min-width: 160px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 10;
        }
        .dropdown-menu a {
            display: block;
            padding: 0.5rem 1rem;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .dropdown:hover .dropdown-menu {
            display: block;
        }
        .theme-toggle-wrapper {
            display: flex;
            align-items: center;
            height: 100%;
        }
        .theme-toggle-wrapper label {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
            cursor: pointer;
        }
        .theme-toggle-wrapper input[type="checkbox"] {
            display: none;
        }
        .admin-box {
            display: flex;
            align-items: center;
            padding: 0.5rem 1rem; 
            border: 1px solid var(--border-color);
            border-radius: 0.25rem;
            background-color: var(--admin-box-bg); 
            color: var(--top-nav-color);
            height: 100%; 
        }
        .admin-box span {
            margin-right: 0.5rem;
        }
    </style>
</head>
<body>

<div class="flex">
    <aside id="sidebar" class="sidebar p-4">
        <a href="{{ route('admin.dashboard') }}" class="flex flex-col items-center space-y-2 mb-4">
            <img src="{{ asset('assets/images/admin/BooksForLess_Logo.png') }}" alt="Logo" class="logo">
            <span class="text-lg font-bold text-white brand">BooksForLess</span>
        </a>
        <ul>
            <li class="py-2">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-2">
                    <i class="fas fa-home w-6 h-6"></i>
                    <span class="sidebar-text">Dashboard</span>
                </a>
            </li>
            <li class="py-2">
                <a href="{{ route('admin.inventory.index') }}" class="flex items-center space-x-2">
                    <i class="fas fa-book w-6 h-6"></i>
                    <span class="sidebar-text">Books Inventory</span>
                </a>
            </li>
            <li class="py-2">
                <a href="{{ route('admin.customers.index') }}" class="flex items-center space-x-2">
                    <i class="fas fa-user w-6 h-6"></i>
                    <span class="sidebar-text">Customers Management</span>
                </a>
            </li>
        </ul>
    </aside>
    <main class="flex-grow">
        <nav class="top-nav">
            <div class="flex items-center space-x-4">
                <button id="toggle-button" class="button">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
            <div class="flex items-center space-x-4">
                <div class="theme-toggle-wrapper">
                    <label>
                        <input type="checkbox" id="theme-toggle">
                        <span id="theme-icon" class="fas fa-moon w-6 h-6 text-gray-500"></span>
                    </label>
                </div>
                <div class="relative dropdown admin-box">
                    <span>{{ Auth::guard('admin')->user()->name }}</span>
                    <i class="fas fa-caret-down"></i>
                    <div class="dropdown-menu">
                        <a href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
        </nav>
        <div id="content" class="content p-4 flex-grow">
            @yield('content')
        </div>
    </main>
</div>

<script>
    document.getElementById('toggle-button').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('collapsed');
        document.getElementById('content').classList.toggle('shifted');
    });

    const themeToggle = document.getElementById('theme-toggle');
    const themeLink = document.getElementById('theme-link');
    const themeIcon = document.getElementById('theme-icon');

    // Function to set theme based on local storage
    function setTheme(theme) {
        if (theme === 'dark') {
            themeLink.setAttribute('href', "{{ asset('assets/css/admin_dark_mode.css') }}");
            themeIcon.classList.remove('fa-moon', 'text-gray-500');
            themeIcon.classList.add('fa-sun', 'text-yellow-500');
            themeToggle.checked = true;
        } else {
            themeLink.setAttribute('href', "{{ asset('assets/css/admin_light_mode.css') }}");
            themeIcon.classList.remove('fa-sun', 'text-yellow-500');
            themeIcon.classList.add('fa-moon', 'text-gray-500');
            themeToggle.checked = false;
        }
    }

    // Set theme on page load
    document.addEventListener('DOMContentLoaded', function () {
        const storedTheme = localStorage.getItem('theme') || 'light';
        setTheme(storedTheme);
    });

    // Toggle theme and save to local storage
    themeToggle.addEventListener('change', function() {
        if (themeToggle.checked) {
            setTheme('dark');
            localStorage.setItem('theme', 'dark');
        } else {
            setTheme('light');
            localStorage.setItem('theme', 'light');
        }
    });
</script>
</body>
</html>
