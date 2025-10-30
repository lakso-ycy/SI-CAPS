/*
Template Name: Spark - App Landing Page Template.
Author: GrayGrids
*/

(function () {
    //===== Preloader (resilient)

    function safeFadeOut() {
        var pre = document.querySelector('.preloader');
        if (!pre) return;
        try {
            pre.style.opacity = '0';
            setTimeout(function () { pre.style.display = 'none'; }, 200);
        } catch (_) { /* noop */ }
    }

    window.addEventListener('load', function () {
        setTimeout(safeFadeOut, 500);
    });

    // Fallback in case 'load' never fires due to some resource error
    document.addEventListener('DOMContentLoaded', function () {
        setTimeout(safeFadeOut, 2500);
    });


    /*=====================================
    Sticky
    ======================================= */
    window.onscroll = function () {
        var header_navbar = document.querySelector(".navbar-area");
        if (header_navbar) {
            var sticky = header_navbar.offsetTop;
            var logo = document.querySelector('.navbar-brand img');
            if (window.pageYOffset > sticky) {
                header_navbar.classList.add("sticky");
                if (logo) logo.src = 'assets/images/logo/diskominfo.svg';
            } else {
                header_navbar.classList.remove("sticky");
                if (logo) logo.src = 'assets/images/logo/diskominfo.svg';
            }
        }

        // show or hide the back-to-top button
        var backToTo = document.querySelector(".scroll-top");
        if (backToTo) {
            if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                backToTo.style.display = "flex";
            } else {
                backToTo.style.display = "none";
            }
        }
    };

    // WOW active (guarded if library missing)
    try { if (typeof WOW !== 'undefined') { new WOW().init(); } } catch (_) {}

    //===== mobile-menu-btn
    var navbarToggler = document.querySelector(".mobile-menu-btn");
    if (navbarToggler) {
        navbarToggler.addEventListener('click', function () {
            navbarToggler.classList.toggle("active");
        });
    }

    //===== Optional: disable links only if explicitly requested via flag
    document.addEventListener('DOMContentLoaded', function(){
        if (window.APP_DISABLE_LINKS === true) {
            var disableSelectors = [
                "a[href*='?page=profile']",
                "a[href*='?page=login']",
                "a[href='profile.html']",
                "a[href='login.html']",
                ".home-btn .btn" // Contact Us
            ];
            disableSelectors.forEach(function(sel){
                document.querySelectorAll(sel).forEach(function(el){
                    el.addEventListener('click', function(e){ e.preventDefault(); e.stopPropagation(); });
                    el.setAttribute('aria-disabled','true');
                    el.title = 'Belum tersedia';
                    try { el.style.cursor = 'not-allowed'; } catch(_){}
                });
            });

            // Disable Google Map interactions
            document.querySelectorAll('.map-container iframe').forEach(function(iframe){
                try { iframe.style.pointerEvents = 'none'; iframe.setAttribute('tabindex','-1'); } catch(_){}
            });
        } else {
            // Smooth scroll for internal anchors like #contact
            document.querySelectorAll('a[href^="#"]').forEach(function(a){
                a.addEventListener('click', function(e){
                    var target = document.querySelector(a.getAttribute('href'));
                    if (target) {
                        e.preventDefault();
                        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            });

            // Ensure map is interactive
            document.querySelectorAll('.map-container iframe').forEach(function(iframe){
                try { iframe.style.pointerEvents = 'auto'; iframe.removeAttribute('tabindex'); } catch(_){}
            });
        }
    });

})();