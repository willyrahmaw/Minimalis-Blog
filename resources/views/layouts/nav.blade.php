<nav class="navbar navbar-expand-lg ">
    <div class="container">
        <a class="navbar-brand" href="{{ route('blog.index') }}">{{ $settings->blog_name ?? env('APP_NAME', 'My Blog') }}</a>
        
        <!-- Mobile: All items visible -->
        <div class="d-flex align-items-center d-lg-none gap-2">
            <ul class="navbar-nav gap-1 me-2">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="search-toggle" style="cursor: pointer;" aria-label="Search articles">
                        <i class="fas fa-search" aria-hidden="true"></i>
                        <span class="visually-hidden">Search</span>
                    </a>
                </li>
            </ul>
            <button class="dark-mode-toggle" id="dark-mode-toggle-mobile" aria-label="Toggle dark mode">
                <i class="fas fa-sun" id="light-icon-mobile" aria-hidden="true"></i>
                <i class="fas fa-moon" id="dark-icon-mobile" style="display: none;" aria-hidden="true"></i>
            </button>
        </div>
        
        <!-- Desktop menu -->
        <div class="d-none d-lg-flex align-items-center">
            <ul class="navbar-nav gap-2 me-3">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('blog.index') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" id="search-toggle-desktop" style="cursor: pointer;" aria-label="Search articles">
                        <i class="fas fa-search" aria-hidden="true"></i>
                        <span class="visually-hidden">Search</span>
                    </a>
                </li>
            </ul>
            <button class="dark-mode-toggle" id="dark-mode-toggle-desktop" aria-label="Toggle dark mode">
                <i class="fas fa-sun" id="light-icon-desktop" aria-hidden="true"></i>
                <i class="fas fa-moon" id="dark-icon-desktop" style="display: none;" aria-hidden="true"></i>
                <span class="visually-hidden">Toggle dark mode</span>
            </button>
        </div>
    </div>
</nav>

<style>
    /* Smooth transitions for navbar elements */
    .dark-mode-toggle, .nav-link {
        transition: all 0.3s ease;
    }
    
    .dark-mode-toggle:hover, .nav-link:hover {
        transform: translateY(-2px);
    }
    
    .dark-mode-toggle:active, .nav-link:active {
        transform: translateY(0);
    }
    
    /* Mobile navbar styling */
    @media (max-width: 991.98px) {
        .navbar {
            flex-wrap: nowrap;
        }
        
        .navbar-nav {
            flex-direction: row;
            align-items: center;
        }
        
        .navbar .nav-link {
            padding: 0.25rem 0.5rem;
            font-size: 0.9rem;
        }
        
        .navbar-brand {
            font-size: 1.5rem;
            margin-right: auto;
        }
        
        .dark-mode-toggle {
            font-size: 1rem;
        }
    }
    
    /* Dark mode styling for navbar */
   
    
    body.dark-mode .navbar-brand {
        color: #f0f0f0 !important;
    }
    
    body.dark-mode .nav-link {
        color: #f0f0f0 !important;
    }
    
    body.dark-mode .nav-link:hover {
        color: #ffffff !important;
    }
    
    body.dark-mode .dark-mode-toggle {
        color: #f0f0f0 !important;
    }
    
    body.dark-mode .dark-mode-toggle:hover {
        color: #ffffff !important;
    }
    
    /* Search icon hover effect */
    .nav-link:hover i {
        transform: scale(1.1);
        transition: transform 0.2s ease;
    }
</style>

<script>
// Sync dark mode toggles
const toggleDarkMode = () => {
    const body = document.body;
    body.classList.toggle('dark-mode');
    
    const isDark = body.classList.contains('dark-mode');
    localStorage.setItem('darkMode', isDark ? 'true' : 'false');
    
    // Update all icons
    document.querySelectorAll('#light-icon-mobile, #light-icon-desktop').forEach(el => {
        el.style.display = isDark ? 'none' : 'inline';
    });
    document.querySelectorAll('#dark-icon-mobile, #dark-icon-desktop').forEach(el => {
        el.style.display = isDark ? 'inline' : 'none';
    });
};

// Initialize
const isDarkMode = localStorage.getItem('darkMode') === 'true';
if (isDarkMode) {
    document.body.classList.add('dark-mode');
    document.querySelectorAll('#light-icon-mobile, #light-icon-desktop').forEach(el => {
        el.style.display = 'none';
    });
    document.querySelectorAll('#dark-icon-mobile, #dark-icon-desktop').forEach(el => {
        el.style.display = 'inline';
    });
}

// Add event listeners
document.getElementById('dark-mode-toggle-mobile')?.addEventListener('click', toggleDarkMode);
document.getElementById('dark-mode-toggle-desktop')?.addEventListener('click', toggleDarkMode);
</script>
