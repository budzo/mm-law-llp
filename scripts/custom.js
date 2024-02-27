document.addEventListener('DOMContentLoaded', function() {
    var mainNav = document.getElementById('main-nav');

    // Add the initial class based on the scroll position
    window.addEventListener('scroll', function() {
        if (window.scrollY > 112) {
            mainNav.classList.add('page-scroll');
        } else {
            mainNav.classList.remove('page-scroll');
        }
    });
});