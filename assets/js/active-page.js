window.onload = function() {
    // Get the current path
    var path = window.location.pathname;

    // Select all nav-link elements
    var navLinks = document.querySelectorAll('.nav-link');

    // Remove .active class from all nav-link elements
    navLinks.forEach(function(link) {
        link.classList.remove('active');
    });

    // Add .active class to the link that matches the current path
    navLinks.forEach(function(link) {
        if (link.getAttribute('href') === path) {
            link.classList.add('active');
        }
    });
};
