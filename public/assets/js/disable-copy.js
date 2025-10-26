// Disable Copy, Cut, Paste, and Select
document.addEventListener('DOMContentLoaded', function() {
    // Disable right-click context menu
    document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
        return false;
    });

    // Disable copy (Ctrl+C, Cmd+C)
    document.addEventListener('copy', function(e) {
        e.preventDefault();
        return false;
    });

    // Disable cut (Ctrl+X, Cmd+X)
    document.addEventListener('cut', function(e) {
        e.preventDefault();
        return false;
    });

    // Disable paste (Ctrl+V, Cmd+V)
    document.addEventListener('paste', function(e) {
        e.preventDefault();
        return false;
    });

    // Disable select (Ctrl+A, Cmd+A)
    document.addEventListener('selectstart', function(e) {
        e.preventDefault();
        return false;
    });

    // Disable keyboard shortcuts
    document.addEventListener('keydown', function(e) {
        // Disable Ctrl+C, Ctrl+X, Ctrl+V
        if (e.ctrlKey && (e.key === 'c' || e.key === 'C' || e.key === 'x' || e.key === 'X' || e.key === 'v' || e.key === 'V')) {
            e.preventDefault();
            return false;
        }
        
        // Disable Ctrl+A (select all)
        if (e.ctrlKey && (e.key === 'a' || e.key === 'A')) {
            e.preventDefault();
            return false;
        }
        
        // Disable Ctrl+S (save page)
        if (e.ctrlKey && (e.key === 's' || e.key === 'S')) {
            e.preventDefault();
            return false;
        }
        
        // Disable Ctrl+P (print)
        if (e.ctrlKey && (e.key === 'p' || e.key === 'P')) {
            e.preventDefault();
            return false;
        }
        
        // Disable Ctrl+U (view source)
        if (e.ctrlKey && (e.key === 'u' || e.key === 'U')) {
            e.preventDefault();
            return false;
        }
        
        // Disable F12 (developer tools)
        if (e.key === 'F12') {
            e.preventDefault();
            return false;
        }
        
        // Disable Ctrl+Shift+I and Ctrl+Shift+J (developer tools)
        if (e.ctrlKey && e.shiftKey && (e.key === 'I' || e.key === 'i' || e.key === 'J' || e.key === 'j')) {
            e.preventDefault();
            return false;
        }
    });

    // Disable text selection on article content
    const articleContent = document.querySelectorAll('.article-content, .article-item');
    articleContent.forEach(function(element) {
        element.style.userSelect = 'none';
        element.style.webkitUserSelect = 'none';
        element.style.mozUserSelect = 'none';
        element.style.msUserSelect = 'none';
    });
});
