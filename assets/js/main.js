/*
Template Name: Spark - App Landing Page Template.
Author: GrayGrids
*/

(function () {
    //===== Prealoder

    window.onload = function () {
        window.setTimeout(function(){
            fadeout();
            // After preloader hides, if URL has #contact and element exists, smooth scroll
            try {
                if (location.hash === '#contact') {
                    var contactEl = document.getElementById('contact');
                    if (contactEl) {
                        contactEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                }
            } catch (e) { /* no-op */ }
        }, 500);
    }

    function fadeout() {
        var pre = document.querySelector('.preloader');
        if (!pre) return;
        pre.style.opacity = '0';
        pre.style.display = 'none';
    }


    /*=====================================
    Sticky
    ======================================= */
    window.onscroll = function () {
        var header_navbar = document.querySelector(".navbar-area");
        var sticky = header_navbar.offsetTop;

        var logo = document.querySelector('.navbar-brand img')
        if (window.pageYOffset > sticky) {
          header_navbar.classList.add("sticky");
          logo.src = 'assets/images/logo/diskominfo.svg';
        } else {
          header_navbar.classList.remove("sticky");
          logo.src = 'assets/images/logo/diskominfo.svg';
        }

        // show or hide the back-top-top button
        var backToTo = document.querySelector(".scroll-top");
        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
            backToTo.style.display = "flex";
        } else {
            backToTo.style.display = "none";
        }
    };

    // WOW active
    // Guard WOW init
    if (typeof WOW !== 'undefined') {
        new WOW().init();
    }

    //===== mobile-menu-btn
    let navbarToggler = document.querySelector(".mobile-menu-btn");
    if (navbarToggler) {
        navbarToggler.addEventListener('click', function () {
            navbarToggler.classList.toggle("active");
        });
    }

    // If users click a link to #contact while already on home, smooth-scroll without reload
    document.addEventListener('click', function(e){
        var target = e.target;
        if (target && target.closest('a[href$="#contact"]')) {
            var link = target.closest('a');
            var isSamePage = /\?page=home/.test(location.search) || location.pathname.endsWith('index.php') || location.pathname.endsWith('/');
            if (isSamePage && document.getElementById('contact')) {
                e.preventDefault();
                document.getElementById('contact').scrollIntoView({ behavior: 'smooth', block: 'start' });
            }
        }
    });


})();