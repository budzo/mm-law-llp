document.addEventListener('DOMContentLoaded', function() {
    var mainNav = document.getElementById('main-nav');
    var navbarToggler = document.querySelector('.navbar-toggler');
    var dropdownLinks = document.querySelectorAll('.nav-link.dropdown-toggle');

    // Add click event listener to the navbar-toggler
    navbarToggler.addEventListener('click', function() {
        // Toggle the 'page-scroll' class on the mainNav
        mainNav.classList.toggle('mobile-open');
    });

    // Function to toggle 'mobile-open' class on mainNav
    function toggleMobileOpenClass() {
        mainNav.classList.toggle('mobile-open');
    }

    // Add click event listener to elements with class names 'nav-link dropdown-toggle' if the window width is 1200px or greater
    if (window.innerWidth >= 1200) {
        dropdownLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                // Toggle the 'mobile-open' class on the mainNav
                toggleMobileOpenClass();
            });
        });
    }

    // Add the initial class based on the scroll position
    window.addEventListener('scroll', function() {
        if (window.scrollY > 96) {
            mainNav.classList.add('page-scroll');
        } else {
            mainNav.classList.remove('page-scroll');
        }
    });
});
