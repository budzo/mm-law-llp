document.addEventListener('DOMContentLoaded', function() {
    var mainNav = document.getElementById('main-nav');
    var navbarToggler = document.querySelector('.navbar-toggler');
    var dropdownLinks = document.querySelectorAll('.nav-link.dropdown-toggle');

    var lastClickedLink = null;

    // Function to toggle 'mobile-open' class on mainNav
    function toggleMobileOpenClass() {
        mainNav.classList.toggle('mobile-open');
    }

    // Add click event listener to elements with class names 'nav-link dropdown-toggle' if the window width is 1200px or greater
    if (window.innerWidth >= 1200) {
        dropdownLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                // Check if it's the same link that was last clicked
                if (lastClickedLink === link) {
                    // If it's the same link, toggle the 'mobile-open' class
                    toggleMobileOpenClass();
                } else {
                    // If it's a different link, update the lastClickedLink variable
                    mainNav.classList.add('mobile-open');
                    lastClickedLink = link;
                }
            });
        });
    }

    // Add click event listener to the navbar-toggler
    navbarToggler.addEventListener('click', function() {
        // Reset the lastClickedLink when the navbar-toggler is clicked
        lastClickedLink = null;
        // Toggle the 'mobile-open' class on the mainNav
        toggleMobileOpenClass();
    });

    // Add the initial class based on the scroll position
    window.addEventListener('scroll', function() {
        if (window.scrollY > 96) {
            mainNav.classList.add('page-scroll');
        } else {
            mainNav.classList.remove('page-scroll');
        }
    });
});
