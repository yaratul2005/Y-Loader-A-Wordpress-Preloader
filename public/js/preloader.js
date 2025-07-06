(function() {
    'use strict';
    window.addEventListener('load', function() {
        const preloader = document.getElementById('y-loader-preloader');
        if (preloader) {
            preloader.classList.add('loaded');
            setTimeout(function() {
                if (preloader.parentNode) {
                    preloader.parentNode.removeChild(preloader);
                }
            }, 600);
        }
    });
})();
