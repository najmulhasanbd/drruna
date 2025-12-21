(function ($) {
    "use strict";


    $(window).on('scroll', function () {
        var scroll = $(window).scrollTop();
        if (scroll < 245) {
            $(".header-sticky").removeClass("sticky");
        } else {
            $(".header-sticky").addClass("sticky");
        }
    });


    const heroSwiper = new Swiper(".heroSwiper", {
        loop: true,
        speed: 1200,
        effect: "fade",
        fadeEffect: {
            crossFade: true,
        },
        autoplay: {
            delay: 4000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });


    AOS.init({
        duration: 1000,
        once: false,
    });


    AOS.init({
        duration: 1000,
        once: false
    });


    document.addEventListener('DOMContentLoaded', function () {
        const serviceModal = document.getElementById('serviceDetailModal');

        serviceModal.addEventListener('show.bs.modal', function (event) {
            // Button that triggered the modal
            const button = event.relatedTarget;

            // Extract info from data-attributes
            const title = button.getAttribute('data-title');
            const description = button.getAttribute('data-desc');

            // Update the modal's content
            const modalTitle = serviceModal.querySelector('#serviceTitle');
            const modalBody = serviceModal.querySelector('#serviceDescription');

            modalTitle.textContent = title;
            modalBody.textContent = description;
        });
    });



    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 1,
        spaceBetween: 30,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            768: {
                slidesPerView: 2
            },
            1024: {
                slidesPerView: 3
            }
        }
    });

    // AOS Animation
    AOS.init({
        duration: 1000,
        once: true
    });


    document.addEventListener("DOMContentLoaded", function () {
        const observerOptions = {
            threshold: 0.1
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('show');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.animate-up').forEach((el) => {
            observer.observe(el);
        });
    });


    AOS.init({
        duration: 1000, // Animation speed
        once: true, // Only animate once when scrolling down
    });


    AOS.init({
        duration: 1000,
        once: true
    });


    $(document).ready(function () {
        $('.popup-gallery').magnificPopup({
            delegate: 'a', // Child selector
            type: 'image',
            gallery: {
                enabled: true, // Enables the slider/gallery mode
                navigateByImgClick: true,
                preload: [0, 1]
            },
            image: {
                titleSrc: function (item) {
                    return item.el.attr('title'); // Popup e caption show korbe
                }
            },
            zoom: {
                enabled: true,
                duration: 300, // Zoom effect duration
                easing: 'ease-in-out'
            }
        });
    });



})(jQuery);
