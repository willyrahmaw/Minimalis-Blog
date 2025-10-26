
// Dark Mode Toggle - handled by nav.blade.php inline script
// This file now only handles search functionality

// Search functionality
let searchTimeout;
const searchToggle = document.getElementById('search-toggle') || document.getElementById('search-toggle-desktop');
const searchPopup = document.getElementById('search-popup');
const searchClose = document.getElementById('search-close');
const searchInput = document.getElementById('search-input');
const searchResults = document.getElementById('search-results');

// Open search popup
if (searchToggle) {
    searchToggle.addEventListener('click', function(e) {
        e.preventDefault();
        searchPopup.classList.add('active');
        setTimeout(() => searchInput.focus(), 100);
    });
}

// Handle mobile search toggle
const mobileSearchToggle = document.getElementById('search-toggle');
if (mobileSearchToggle && mobileSearchToggle.id === 'search-toggle') {
    mobileSearchToggle.addEventListener('click', function(e) {
        e.preventDefault();
        searchPopup.classList.add('active');
        setTimeout(() => searchInput.focus(), 100);
    });
}

// Handle desktop search toggle
const desktopSearchToggle = document.getElementById('search-toggle-desktop');
if (desktopSearchToggle) {
    desktopSearchToggle.addEventListener('click', function(e) {
        e.preventDefault();
        searchPopup.classList.add('active');
        setTimeout(() => searchInput.focus(), 100);
    });
}

// Close search popup
if (searchClose) {
    searchClose.addEventListener('click', function() {
        searchPopup.classList.remove('active');
        searchInput.value = '';
        searchResults.innerHTML = '';
    });
}

// Close on background click
if (searchPopup) {
    searchPopup.addEventListener('click', function(e) {
        if (e.target === searchPopup) {
            searchPopup.classList.remove('active');
            searchInput.value = '';
            searchResults.innerHTML = '';
        }
    });
}

// Close on ESC key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape' && searchPopup.classList.contains('active')) {
        searchPopup.classList.remove('active');
        searchInput.value = '';
        searchResults.innerHTML = '';
    }
});

// Search functionality
if (searchInput) {
    searchInput.addEventListener('input', function() {
        const query = this.value.trim();
        
        clearTimeout(searchTimeout);
        
        if (query.length < 2) {
            searchResults.innerHTML = '';
            return;
        }
        
        searchTimeout = setTimeout(() => {
            fetch(`/blog?search=${encodeURIComponent(query)}`, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => response.text())
            .then(html => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, 'text/html');
                const articles = doc.querySelectorAll('.article-item');
                
                if (articles.length > 0) {
                    searchResults.innerHTML = '';
                    articles.forEach(article => {
                        const title = article.querySelector('.article-title a').textContent;
                        const href = article.querySelector('.article-title a').href;
                        const meta = article.querySelector('.article-meta').textContent;
                        
                        const item = document.createElement('div');
                        item.className = 'search-result-item';
                        item.innerHTML = `
                            <div class="search-result-title">${title}</div>
                            <div class="search-result-meta">${meta}</div>
                        `;
                        item.addEventListener('click', () => {
                            window.location.href = href;
                        });
                        searchResults.appendChild(item);
                    });
                } else {
                    searchResults.innerHTML = '<div class="no-results">No results found</div>';
                }
            })
            .catch(error => {
                console.error('Search error:', error);
            });
        }, 300);
    });

    searchInput.addEventListener('keydown', function(e) {
        if (e.key === 'Enter') {
            if (this.value.trim()) {
                window.location.href = `/blog?search=${encodeURIComponent(this.value)}`;
            }
        }
    });
}

// Scroll Animation for Articles
document.addEventListener('DOMContentLoaded', function() {
    const articles = document.querySelectorAll('.article-item');
    
    // Intersection Observer for scroll animations
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            } else {
                // Remove animation when scrolling out of view
                entry.target.classList.remove('animate-in');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -100px 0px'
    });
    
    // Observe all articles
    articles.forEach(article => {
        observer.observe(article);
    });
});

// Scroll to Top Button
document.addEventListener('DOMContentLoaded', function() {
    const scrollToTopBtn = document.getElementById('scrollToTop');
    
    if (scrollToTopBtn) {
        // Show/hide button based on scroll position
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                scrollToTopBtn.classList.add('show');
            } else {
                scrollToTopBtn.classList.remove('show');
            }
        });
        
        // Smooth scroll to top when clicked
        scrollToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
});
