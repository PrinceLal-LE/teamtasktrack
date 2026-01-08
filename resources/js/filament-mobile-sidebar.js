// Filament Mobile Sidebar Auto-Close Functionality
(function() {
    'use strict';
    
    // Function to close sidebar on mobile
    function closeMobileSidebar() {
        if (window.innerWidth >= 1024) return; // Only on mobile
        
        const sidebar = document.querySelector('.fi-sidebar');
        if (!sidebar) return;
        
        // Try to find and click the backdrop first (most reliable)
        const backdrop = document.querySelector('.fi-sidebar-backdrop, [x-on\\:click*="closeSidebar"], [x-on:click*="closeSidebar"]');
        if (backdrop) {
            backdrop.click();
            return;
        }
        
        // Try to find sidebar toggle button and click it if sidebar is open
        const sidebarToggle = document.querySelector('[x-on\\:click*="toggleSidebar"], [x-on:click*="toggleSidebar"], button[aria-label*="sidebar"], button[aria-label*="menu"]');
        if (sidebarToggle && sidebar.classList.contains('fi-sidebar-open')) {
            sidebarToggle.click();
            return;
        }
        
        // Fallback: Directly manipulate classes and Alpine.js data
        sidebar.classList.remove('fi-sidebar-open');
        document.body.classList.remove('fi-sidebar-open');
        document.documentElement.classList.remove('fi-sidebar-open');
        
        // Remove backdrop
        const backdropElement = document.querySelector('.fi-sidebar-backdrop');
        if (backdropElement) {
            backdropElement.remove();
        }
        
        // Try to access Alpine.js component and set sidebarOpen to false
        try {
            const alpineElement = sidebar.closest('[x-data]');
            if (alpineElement && window.Alpine) {
                const alpineData = window.Alpine.$data(alpineElement);
                if (alpineData && typeof alpineData.sidebarOpen !== 'undefined') {
                    alpineData.sidebarOpen = false;
                }
            }
        } catch (e) {
            // Alpine.js might not be ready, that's okay
        }
    }
    
    // Ensure sidebar is closed on mobile on page load
    function ensureSidebarClosedOnMobile() {
        if (window.innerWidth < 1024) {
            const sidebar = document.querySelector('.fi-sidebar');
            if (sidebar) {
                // Remove open classes
                sidebar.classList.remove('fi-sidebar-open');
                document.body.classList.remove('fi-sidebar-open');
                document.documentElement.classList.remove('fi-sidebar-open');
                
                // Remove backdrop if exists
                const backdrop = document.querySelector('.fi-sidebar-backdrop');
                if (backdrop) {
                    backdrop.remove();
                }
                
                // Try to access Alpine.js component and set sidebarOpen to false
                try {
                    const alpineElement = sidebar.closest('[x-data]');
                    if (alpineElement && window.Alpine) {
                        const alpineData = window.Alpine.$data(alpineElement);
                        if (alpineData && typeof alpineData.sidebarOpen !== 'undefined') {
                            alpineData.sidebarOpen = false;
                        }
                    }
                } catch (e) {
                    // Alpine.js might not be ready yet, that's okay
                }
            }
        }
    }
    
    // Wait for DOM and Alpine.js to be ready
    function init() {
        // Ensure sidebar starts closed on mobile
        ensureSidebarClosedOnMobile();
        
        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(e) {
            if (window.innerWidth >= 1024) return; // Only on mobile
            
            const sidebar = document.querySelector('.fi-sidebar');
            const sidebarNav = document.querySelector('.fi-sidebar-nav');
            const sidebarToggle = document.querySelector('[aria-label*="sidebar"], button[aria-label*="menu"], [x-on\\:click*="toggleSidebar"]');
            const userMenu = document.querySelector('[x-data*="userMenu"], .fi-user-menu');
            
            // Check if click is inside sidebar or on toggle button
            const isClickInsideSidebar = sidebar && (
                sidebar.contains(e.target) || 
                (sidebarNav && sidebarNav.contains(e.target))
            );
            const isClickOnToggle = sidebarToggle && sidebarToggle.contains(e.target);
            const isClickOnUserMenu = userMenu && userMenu.contains(e.target);
            const isClickOnBackdrop = e.target.classList.contains('fi-sidebar-backdrop');
            
            // Close sidebar if clicking outside (but not on user menu) or on backdrop
            if ((!isClickInsideSidebar && !isClickOnToggle && !isClickOnUserMenu) || isClickOnBackdrop) {
                closeMobileSidebar();
            }
        });
        
        // Close sidebar when navigating on mobile (Livewire)
        document.addEventListener('livewire:navigated', function() {
            setTimeout(closeMobileSidebar, 150);
        });
        
        // Close sidebar when pressing escape key on mobile
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && window.innerWidth < 1024) {
                closeMobileSidebar();
            }
        });
        
        // Handle window resize
        let resizeTimer;
        window.addEventListener('resize', function() {
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(function() {
                if (window.innerWidth < 1024) {
                    // On mobile, ensure sidebar is closed
                    ensureSidebarClosedOnMobile();
                } else {
                    // On desktop, ensure sidebar can be visible
                    const sidebar = document.querySelector('.fi-sidebar');
                    if (sidebar) {
                        // Don't force open, just ensure it's not forced closed
                    }
                }
            }, 250);
        });
        
        // Also ensure sidebar is closed when page loads on mobile
        window.addEventListener('load', ensureSidebarClosedOnMobile);
        
        // Close sidebar when a navigation link is clicked on mobile
        document.addEventListener('click', function(e) {
            if (window.innerWidth >= 1024) return;
            
            const navLink = e.target.closest('a[href], button[type="button"]');
            if (navLink && navLink.closest('.fi-sidebar-nav')) {
                setTimeout(closeMobileSidebar, 100);
            }
        });
    }
    
    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        // DOM already loaded, wait a bit for Alpine.js
        setTimeout(init, 100);
    }
    
    // Also initialize when Alpine.js is ready (if available)
    if (window.Alpine) {
        window.Alpine.plugin(function(Alpine) {
            Alpine.nextTick(init);
        });
    }
})();
