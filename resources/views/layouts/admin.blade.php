<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        .sidebar {
            min-height: 100vh;
            background: #2c3e50;
            padding: 20px;
            border-right: 1px solid #dee2e6;
            width: 250px;
            z-index: 1040;
        }
        .sidebar .nav-link {
            color: #bdc3c7;
            padding: 10px 15px;
            border-radius: 4px;
            margin-bottom: 3px;
            transition: all 0.2s;
            font-size: 14px;
        }
        .sidebar .nav-link:hover {
            background: #34495e;
            color: white;
        }
        .sidebar .nav-link.active {
            background: #34495e;
            color: white;
        }
        .sidebar .nav-link i {
            width: 16px;
            margin-right: 8px;
        }
        .content-wrapper {
            padding: 30px;
            margin-left: 250px;
            transition: all 0.3s ease;
            min-height: 100vh;
            width: calc(100% - 250px);
        }
        .stat-card {
            border-radius: 6px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            background: white;
            border: 1px solid #dee2e6;
        }
        .stat-card i {
            font-size: 2rem;
            margin-bottom: 10px;
        }
        .sidebar-header {
            border-bottom: 1px solid #34495e;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }
        
        .sidebar-header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .sidebar-header h4 {
            color: white;
            font-size: 18px;
            margin: 0;
        }
        .user-info {
            border-top: 1px solid #34495e;
            padding-top: 15px;
            margin-top: 20px;
        }
        .user-info p {
            color: #bdc3c7;
            font-size: 13px;
            margin-bottom: 10px;
        }
        .btn-logout {
            background: #e74c3c;
            border: none;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 12px;
            width: 100%;
        }
        .btn-logout:hover {
            background: #c0392b;
        }
        
        /* Sidebar Toggle Styles */
        .sidebar-toggle-wrapper {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1050;
            display: none;
            transition: all 0.3s ease;
        }
        
        .sidebar-toggle-wrapper.show {
            display: block;
        }
        
        .admin-header {
            background: #2c3e50;
            color: white;
            padding: 15px 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 15px;
            position: sticky;
            top: 0;
            z-index: 1030;
        }
        
        .admin-header h1 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }
        
        .sidebar-toggle {
            background: #34495e;
            border: none;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            transition: all 0.2s;
        }
        
        .sidebar-toggle:hover {
            background: #2c3e50;
        }
        
        .sidebar-header .sidebar-toggle {
            background: #34495e;
            margin: 0;
            padding: 6px 10px;
            border-radius: 4px;
            border: none;
            color: white;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .sidebar-header .sidebar-toggle:hover {
            background: #2c3e50;
        }
        
        .sidebar-close {
            background: none;
            border: none;
            color: #bdc3c7;
            font-size: 18px;
            cursor: pointer;
            padding: 5px;
            margin-left: auto;
        }
        
        .sidebar-close:hover {
            color: white;
        }
        
        /* Sidebar Collapse Styles */
        .sidebar {
            transition: all 0.3s ease;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
        }
        
        .sidebar.collapsed {
            width: 60px;
        }
        
        .sidebar.collapsed .sidebar-header-content h4,
        .sidebar.collapsed .nav-link span,
        .sidebar.collapsed .user-info p {
            display: none;
        }
        
        .sidebar.collapsed .sidebar-header .sidebar-toggle {
            display: block !important;
        }
        
        .sidebar.collapsed .nav-link {
            text-align: center;
            padding: 10px 5px;
        }
        
        .sidebar.collapsed .nav-link i {
            margin-right: 0;
            font-size: 18px;
        }
        
        .sidebar.collapsed .sidebar-header-content {
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        
        .sidebar.collapsed .sidebar-header {
            padding: 15px 5px;
        }
        
        .sidebar.collapsed .user-info {
            text-align: center;
        }
        
        .sidebar.collapsed .btn-logout {
            padding: 6px;
            font-size: 10px;
        }
        
        .sidebar.collapsed .nav-link {
            position: relative;
        }
        
        .sidebar.collapsed .nav-link:hover::after {
            content: attr(data-tooltip);
            position: absolute;
            left: 100%;
            top: 50%;
            transform: translateY(-50%);
            background: #2c3e50;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 12px;
            white-space: nowrap;
            z-index: 1000;
            margin-left: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.2);
        }
        
        .sidebar.collapsed .nav-link:hover::before {
            content: '';
            position: absolute;
            left: 100%;
            top: 50%;
            transform: translateY(-50%);
            border: 5px solid transparent;
            border-right-color: #2c3e50;
            margin-left: 5px;
            z-index: 1000;
        }
        
        .content-wrapper {
            transition: all 0.3s ease;
        }
        
        .content-wrapper.expanded {
            margin-left: 0;
        }
        
        /* Mobile Styles */
        @media (max-width: 991.98px) {
            .sidebar-toggle-wrapper {
                display: block;
            }
            
            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                height: 100vh;
                z-index: 1040;
                transform: translateX(-100%);
                width: 250px;
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .content-wrapper {
                margin-left: 0 !important;
                width: 100% !important;
            }
            
            .sidebar-header-content {
                display: flex;
                justify-content: space-between;
                align-items: center;
            }
        }
        
        /* Desktop Styles */
        @media (min-width: 992px) {
            .sidebar-toggle-wrapper {
                display: none;
            }
            
            .sidebar-toggle-wrapper.show {
                display: block;
            }
            
            .sidebar-header .sidebar-toggle {
                display: block;
            }
            
            .sidebar {
                position: fixed;
                top: 0;
                left: 0;
                height: 100vh;
                z-index: 1040;
                width: 250px;
                transition: width 0.3s ease;
            }
            
            .sidebar.collapsed {
                width: 60px;
            }
            
            .content-wrapper {
                margin-left: 250px;
                transition: all 0.3s ease;
                width: calc(100% - 250px);
            }
            
            .content-wrapper.expanded {
                margin-left: 60px;
                width: calc(100% - 60px);
            }
            
            .sidebar-close {
                display: none;
            }
        }
        
        /* Overlay for mobile */
        .sidebar-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0,0,0,0.5);
            z-index: 1035;
            display: none;
        }
        
        .sidebar-overlay.show {
            display: block;
        }
        
        /* Hide overlay on desktop */
        @media (min-width: 992px) {
            .sidebar-overlay {
                display: none !important;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar Toggle Button (Desktop) -->
    <div class="sidebar-toggle-wrapper">
        <button class="sidebar-toggle" id="sidebarToggle">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- Sidebar Overlay (Mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <div class="container-fluid">
        <div class="row">
            <div class="sidebar" id="sidebar">
                <div class="sidebar-header">
                    <div class="sidebar-header-content">
                        <h4><i class="fas fa-blog"></i> {{ Auth::user()->role == 'admin' ? 'Admin Dashboard' : Auth::user()->name ?? 'User' }}</h4>
                        <button class="sidebar-toggle d-none d-md-block" id="sidebarToggleDesktop">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>
                    <button class="sidebar-close d-md-none" id="sidebarClose">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}" data-tooltip="Dashboard">
                            <i class="fas fa-home"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('posts.create') ? 'active' : '' }}" href="{{ route('posts.create') }}" data-tooltip="Create Post">
                            <i class="fas fa-plus-circle"></i> <span>Create Post</span>
                        </a>
                    </li>
                    @if(Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.settings') ? 'active' : '' }}" href="{{ route('admin.settings') }}" data-tooltip="Settings">
                            <i class="fas fa-cog"></i> <span>Settings</span>
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('blog.index') }}" target="_blank" data-tooltip="View Blog">
                            <i class="fas fa-eye"></i> <span>View Blog</span>
                        </a>
                    </li>
                </ul>
                
                <div class="user-info">
                    <p><i class="fas fa-user"></i> {{ Auth::user()->name }}</p>
                    <p><i class="fas fa-tag"></i> {{ ucfirst(Auth::user()->role ?? 'user') }}</p>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn-logout">
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                    </form>
                </div>
            </div>
            <div class="content-wrapper" id="mainContent">
                <div class="admin-header">
                    <h1>@yield('title', 'Admin Dashboard')</h1>
                </div>
                
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebarToggle = document.getElementById('sidebarToggle');
            const sidebarToggleDesktop = document.getElementById('sidebarToggleDesktop');
            const sidebar = document.getElementById('sidebar');
            const sidebarClose = document.getElementById('sidebarClose');
            const sidebarOverlay = document.getElementById('sidebarOverlay');
            const mainContent = document.getElementById('mainContent');
            const sidebarToggleWrapper = document.querySelector('.sidebar-toggle-wrapper');
            
            // Toggle sidebar
            function toggleSidebar() {
                if (window.innerWidth < 992) {
                    // Mobile behavior
                    sidebar.classList.toggle('show');
                    sidebarOverlay.classList.toggle('show');
                } else {
                    // Desktop behavior
                    sidebar.classList.toggle('collapsed');
                    mainContent.classList.toggle('expanded');
                    
                    // Hide toggle button in top-left (not needed for collapsed sidebar)
                    sidebarToggleWrapper.classList.remove('show');
                    
                    // Update toggle button icon
                    const toggleButtons = document.querySelectorAll('.sidebar-toggle');
                    toggleButtons.forEach(btn => {
                        const icon = btn.querySelector('i');
                        if (sidebar.classList.contains('collapsed')) {
                            icon.className = 'fas fa-bars';
                        } else {
                            icon.className = 'fas fa-times';
                        }
                    });
                }
            }
            
            // Close sidebar
            function closeSidebar() {
                if (window.innerWidth < 992) {
                    // Mobile behavior
                    sidebar.classList.remove('show');
                    sidebarOverlay.classList.remove('show');
                } else {
                    // Desktop behavior
                    sidebar.classList.remove('collapsed');
                    mainContent.classList.remove('expanded');
                    
                    // Hide toggle button in top-left
                    sidebarToggleWrapper.classList.remove('show');
                    
                    // Update toggle button icon
                    const toggleButtons = document.querySelectorAll('.sidebar-toggle');
                    toggleButtons.forEach(btn => {
                        const icon = btn.querySelector('i');
                        icon.className = 'fas fa-bars';
                    });
                }
            }
            
            // Event listeners
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', toggleSidebar);
            }
            if (sidebarToggleDesktop) {
                sidebarToggleDesktop.addEventListener('click', toggleSidebar);
            }
            if (sidebarClose) {
                sidebarClose.addEventListener('click', closeSidebar);
            }
            if (sidebarOverlay) {
                sidebarOverlay.addEventListener('click', closeSidebar);
            }
            
            // Close sidebar when clicking on nav links (mobile)
            const navLinks = document.querySelectorAll('.sidebar .nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 992) {
                        closeSidebar();
                    }
                });
            });
            
            // Handle window resize
            window.addEventListener('resize', function() {
                if (window.innerWidth >= 992) {
                    // Switch to desktop mode
                    sidebar.classList.remove('show');
                    sidebarOverlay.classList.remove('show');
                    sidebarOverlay.style.display = 'none';
                    // Reset mobile classes
                    sidebar.classList.remove('collapsed');
                    mainContent.classList.remove('expanded');
                } else {
                    // Switch to mobile mode
                    sidebar.classList.remove('collapsed');
                    mainContent.classList.remove('expanded');
                    sidebarOverlay.style.display = 'block';
                    // Reset desktop classes
                    sidebar.classList.remove('show');
                    sidebarOverlay.classList.remove('show');
                }
            });
        });
    </script>
</body>
</html>
