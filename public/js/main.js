/**
 * VODIC Website - Enhanced JavaScript
 * Main interactive functionality
 */

// Toggle Government Info Banner
function toggleGovInfo() {
    const govInfo = document.getElementById('govInfo');
    const toggleBtn = document.querySelector('.gov-banner-toggle');
    
    if (govInfo && toggleBtn) {
        govInfo.classList.toggle('show');
        toggleBtn.classList.toggle('active');
    }
}

// Toggle Mobile Menu
function toggleMobileMenu() {
    const mobileMenu = document.getElementById('mobileMenu');
    if (mobileMenu) {
        mobileMenu.classList.toggle('show');
        
        // Toggle body scroll
        if (mobileMenu.classList.contains('show')) {
            document.body.style.overflow = 'hidden';
        } else {
            document.body.style.overflow = '';
        }
    }
}

// Close mobile menu when clicking outside
document.addEventListener('click', (event) => {
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    
    if (mobileMenu && mobileMenuBtn) {
        if (!mobileMenu.contains(event.target) && !mobileMenuBtn.contains(event.target)) {
            mobileMenu.classList.remove('show');
            document.body.style.overflow = '';
        }
    }
});

// Weather Search Functionality
document.addEventListener('DOMContentLoaded', () => {
    // Weather inputs
    const weatherInputs = document.querySelectorAll('.weather-input, .mobile-weather-input');
    
    weatherInputs.forEach((input) => {
        input.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                const location = this.value.trim();
                if (location) {
                    // In Laravel: window.location.href = `/weather?location=${encodeURIComponent(location)}`;
                    console.log(`Tìm kiếm thời tiết cho: ${location}`);
                    // You can implement actual search functionality here
                }
            }
        });
    });
    
    // Search Button Click
    const searchBtns = document.querySelectorAll('.search-btn');
    searchBtns.forEach((btn) => {
        btn.addEventListener('click', function() {
            const input = this.previousElementSibling;
            if (input) {
                const location = input.value.trim();
                if (location) {
                    console.log(`Tìm kiếm thời tiết cho: ${location}`);
                }
            }
        });
    });
    
    // Header Search
    const headerSearchForm = document.querySelector('.header-search form');
    if (headerSearchForm) {
        headerSearchForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const input = headerSearchForm.querySelector('.header-search-input');
            const query = input.value.trim();
            if (query) {
                // In Laravel: window.location.href = `/search?q=${encodeURIComponent(query)}`;
                window.location.href = `/tim-kiem?search=${encodeURIComponent(query)}`;
            }
        });
    }
    
    // Initialize animations on scroll
    initScrollAnimations();
    
    // Smooth scroll for anchor links
    initSmoothScroll();
    
    // Initialize lazy loading for images
    initLazyLoading();
    
    // Back to top button
    initBackToTop();
    
    // News card interactions
    initNewsCardInteractions();
});

/**
 * Initialize scroll animations
 */
function initScrollAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('fade-in-up');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);
    
    // Observe news cards
    document.querySelectorAll('.news-card').forEach(card => {
        observer.observe(card);
    });
    
    // Observe explore items
    document.querySelectorAll('.explore-item').forEach(item => {
        observer.observe(item);
    });
}

/**
 * Initialize smooth scroll
 */
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            const href = this.getAttribute('href');
            if (href === '#') return;
            
            e.preventDefault();
            const target = document.querySelector(href);
            
            if (target) {
                const headerHeight = document.querySelector('.header')?.offsetHeight || 0;
                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

/**
 * Initialize lazy loading for images
 */
function initLazyLoading() {
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.removeAttribute('data-src');
                    }
                    imageObserver.unobserve(img);
                }
            });
        });
        
        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }
}

/**
 * Back to top button
 */
function initBackToTop() {
    // Create back to top button
    const backToTopBtn = document.createElement('button');
    backToTopBtn.innerHTML = '↑';
    backToTopBtn.className = 'back-to-top';
    backToTopBtn.setAttribute('aria-label', 'Về đầu trang');
    backToTopBtn.style.cssText = `
        position: fixed;
        bottom: 2rem;
        right: 2rem;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: var(--ocean-blue);
        color: white;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
        z-index: 999;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    `;
    
    document.body.appendChild(backToTopBtn);
    
    // Show/hide on scroll
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            backToTopBtn.style.opacity = '1';
            backToTopBtn.style.visibility = 'visible';
        } else {
            backToTopBtn.style.opacity = '0';
            backToTopBtn.style.visibility = 'hidden';
        }
    });
    
    // Scroll to top on click
    backToTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
    
    // Hover effect
    backToTopBtn.addEventListener('mouseenter', () => {
        backToTopBtn.style.transform = 'translateY(-5px)';
        backToTopBtn.style.boxShadow = '0 6px 16px rgba(0, 0, 0, 0.2)';
    });
    
    backToTopBtn.addEventListener('mouseleave', () => {
        backToTopBtn.style.transform = 'translateY(0)';
        backToTopBtn.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.15)';
    });
}

/**
 * News card interactions
 */
function initNewsCardInteractions() {
    document.querySelectorAll('.news-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.zIndex = '10';
        });
        
        card.addEventListener('mouseleave', function() {
            this.style.zIndex = '1';
        });
    });
}

/**
 * Form validation helper
 */
function validateForm(formId) {
    const form = document.getElementById(formId);
    if (!form) return false;
    
    let isValid = true;
    const inputs = form.querySelectorAll('input[required], textarea[required], select[required]');
    
    inputs.forEach(input => {
        if (!input.value.trim()) {
            isValid = false;
            input.classList.add('error');
            
            // Remove error class on input
            input.addEventListener('input', function() {
                this.classList.remove('error');
            });
        }
    });
    
    return isValid;
}

/**
 * Show notification
 */
function showNotification(message, type = 'info') {
    const notification = document.createElement('div');
    notification.className = `alert alert-${type} slide-down`;
    notification.style.cssText = `
        position: fixed;
        top: 2rem;
        right: 2rem;
        max-width: 400px;
        z-index: 9999;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    `;
    notification.textContent = message;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.opacity = '0';
        notification.style.transform = 'translateY(-20px)';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

/**
 * Debounce function for performance
 */
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

/**
 * Handle window resize
 */
const handleResize = debounce(() => {
    // Close mobile menu on resize to desktop
    if (window.innerWidth >= 768) {
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileMenu) {
            mobileMenu.classList.remove('show');
            document.body.style.overflow = '';
        }
    }
}, 250);

window.addEventListener('resize', handleResize);

/**
 * Handle scroll events
 */
let lastScrollTop = 0;
const header = document.querySelector('.header');

window.addEventListener('scroll', debounce(() => {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    
    // Add shadow to header on scroll
    if (header) {
        if (scrollTop > 10) {
            header.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.1)';
        } else {
            header.style.boxShadow = '0 4px 6px -1px rgba(0, 0, 0, 0.1)';
        }
    }
    
    lastScrollTop = scrollTop;
}, 100));

/**
 * Keyboard navigation support
 */
document.addEventListener('keydown', (e) => {
    // Close mobile menu on Escape
    if (e.key === 'Escape') {
        const mobileMenu = document.getElementById('mobileMenu');
        if (mobileMenu && mobileMenu.classList.contains('show')) {
            mobileMenu.classList.remove('show');
            document.body.style.overflow = '';
        }
    }
});

/**
 * Print functionality
 */
function printPage() {
    window.print();
}

// Export functions for use in other scripts
window.VODIC = {
    toggleGovInfo,
    toggleMobileMenu,
    validateForm,
    showNotification,
    printPage
};